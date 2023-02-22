<?php

$absolutePathArray = explode("\\", __DIR__);
$absolutePath = "";

foreach (array_slice($absolutePathArray, 0, 5) as $element) {
    $absolutePath .= $element . "\\";
}

include($absolutePath . "connection.php");
include($absolutePath . "users/validations/validateNewUser.php");
include("../../functions/hashingPassword.php");
class UsersQueries extends Connection
{

    private $validatingUserObject;
    private $dataForm;

    public function __construct()
    {
        $this->validatingUserObject = new ValidatingUser();
    }

    private function closeConnection()
    {
        $this->connect()->close();
    }

    public function allUsers()
    {
        $data = array();
        $result = $this->connect()->query("CALL allUsers();");
        $counter = 0;

        while ($row = $result->fetch_assoc()) {
            $data[$counter] = $row;
            $counter++;
        }
        $this->closeConnection();

        $jsonResult = json_encode($data);
        return $jsonResult;
    }

    public function userSearchByDNI()
    {

        if (isset($_POST['cedula'])) {
            $parameter = $_POST['cedula'];

            if (ctype_digit($parameter)) {
                $stmt = $this->connect()->prepare("CALL userSearchByCedula(?);");
                $stmt->bind_param("s", $parameter);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_assoc();
            }
        }
        $this->connect()->close();

        return json_encode($result);
    }

    public function disableUser()
    {

        $response = 0;

        if (isset($_POST['cedula'])) {
            $parameter = $_POST['cedula'];
            $this->connect()->query("CALL disableUser($parameter);");
            $response = 1;
        }
        $this->closeConnection();
        return $response;
    }

    public function enableUser()
    {
        $response = 0;

        if (isset($_POST['cedula'])) {
            $parameter = $_POST['cedula'];
            $this->connect()->query("CALL enableUser($parameter);");
            $response = 2;
        }

        $this->closeConnection();
        return $response;
    }

    private function getAllPeopleTelephones()
    {
        $result = $this->connect()->query("CALL getAllPeopleTelephones();");
        $this->closeConnection();

        $numbers = array();
        $counter = 0;

        while ($row = $result->fetch_column()) {
            $numbers[$counter] = $row;
            $counter++;
        }

        $json_result = json_encode($numbers);
        return $json_result;
    }

    private function validatingExistingPhoneNumber($phoneNumber)
    {

        $numbers = $this->getAllPeopleTelephones();
        $arrayOfNumbers = (json_decode($numbers));
        $response = false;

        foreach ($arrayOfNumbers as $number) {
            if ($number == $phoneNumber) {
                $response = true;
                break;
            }
        }
        return $response;
    }

    private function createMaskRegion($regionNumber)
    {
        $masks = array("SJO", "HER", "PUN", "GUA", "ALA", "LIM", "CAR");
        return $masks[$regionNumber];
    }

    private function mergeRegMachineNum($regionalMask, $machineNumber)
    {
        return $regionalMask . "-" . $machineNumber;
    }

    private function getLastUserId()
    {
        $lastUserId = $this->connect()->query("CALL getLastUserId();");
        return $lastUserId->fetch_array()['id_usuario'];
    }

    private function createIdSequence($lastId)
    {
        $newId = "";
        $number = (int) ++$lastId;
        $digits = log10($number) + 1;

        for ($i = 0; $i < (6 - $digits); $i++) {
            $newId .= "0";
        }

        $newId .= $number;
        return $newId;
    }

    private function setRol($numberRol)
    {

        if ($numberRol == '1') {
            $this->dataForm['rol'] = "Jefe Superior";
        } else if ($numberRol == '2') {
            $this->dataForm['rol'] = "Jefe";
        } else {
            $this->dataForm['rol'] = "Tecnico";
        }
    }

    private function processingDataUserForm($signal): array
    {
        $response = 1;

        $this->dataForm = array(
            "dni" => $_POST['cedulaInput'],
            "name" => $_POST['nameInput'],
            "firstSurname" => $_POST['firstSurnameInput'],
            "secondSurname" => $_POST['secondSurnameInput'],
            "phone" => $_POST['phoneInput'],
            "rol" => $_POST['rolInput'],
            "userName" => $_POST['userNameInput'],
            "regional" => $_POST['regionalInput'],
            "machineNumber" => $_POST['machineNumberInput'],
            "email" => $_POST['emailInput'],
            "password" => null
        );


        foreach ($this->dataForm as $data) {
            if (!isset($data)) {
                $response = 0;
                break;
            }
        }

        if ($response == 1) {
            $this->dataForm['regional'] = $this->createMaskRegion($this->dataForm['regional']);

            $this->dataForm['machineNumber'] = $this->mergeRegMachineNum(
                $this->dataForm['regional'],
                $this->dataForm['machineNumber']
            );

            $this->setRol($this->dataForm['rol']);

            $completeName = array(
                "name" => $this->dataForm['name'],
                "firstName" => $this->dataForm['firstSurname'],
                "secondName" => $this->dataForm['secondSurname']
            );

            if($signal == 1){
            if (!($this->validatingUserObject->validatingNumbers($this->dataForm['dni']) and
                $this->validatingUserObject->validatingNumbers($this->dataForm['phone']) and
                !$this->validatingExistingPhoneNumber($this->dataForm['phone']) and
                !$this->validatingUserObject->validatingCompleteName($completeName) and
                !$this->validatingUserObject->validatingMachineNumber($this->dataForm['machineNumber']) and
                $this->validatingUserObject->validatingPassword($this->dataForm['password']) and
                !$this->validatingUserObject->validatingEmail($this->dataForm['email']))){
                    $response = 0;
                }
            }else{
                if (!($this->validatingUserObject->validatingNumbers($this->dataForm['dni']) and
                $this->validatingUserObject->validatingNumbers($this->dataForm['phone']) and
                !$this->validatingUserObject->validatingCompleteName($completeName) and
                !$this->validatingUserObject->validatingMachineNumber($this->dataForm['machineNumber']) and
                !$this->validatingUserObject->validatingEmail($this->dataForm['email']))) 
                {
                    $response = 0;
                }
            }
        }
        return array($response, $this->dataForm);
    }

    public function createNewUser()
    {
        $response = false;
        $newId = $this->createIdSequence($this->getLastUserId());
        $dataProcessed = $this->processingDataUserForm(1);
        $status = 1;

        $dataPerson = array(

            $dataProcessed[1]['dni'],
            $dataProcessed[1]['name'],
            $dataProcessed[1]['firstSurname'],
            $dataProcessed[1]['secondSurname'],
            $dataProcessed[1]['phone'],
            $dataProcessed[1]['rol'],
            $dataProcessed[1]['userName'],
            $dataProcessed[1]['machineNumber'],
            $dataProcessed[1]['email'],
            $dataProcessed[1]['password'],
            $dataProcessed[1]['dni']
        );
        $passwordHashed = hashPassword($dataPerson[9]);
        
        if ($dataProcessed[0]) {
            try {
                $stmt = $this->connect()->prepare('CALL newPerson(?,?,?,?,?,?)');
                $stmt->bind_param(
                    'ssssss',
                    $dataPerson[0],
                    $dataPerson[1],
                    $dataPerson[2],
                    $dataPerson[3],
                    $dataPerson[4],
                    $dataPerson[5]
                );

                $stmt->execute();
                $this->connect()->close();

                $stmt = $this->connect()->prepare('CALL newUser(?,?,?,?,?,?,?)');
                $stmt->bind_param(
                    "sssssis",
                    $newId,
                    $dataPerson[6],
                    $dataPerson[7],
                    $dataPerson[8],
                    $passwordHashed,
                    $status,
                    $dataPerson[0]
                );

                $stmt->execute();
                $this->connect()->close();

                $response = true;
            } catch (Exception $exception) {
                $response = false;
            }
        }
        return $response;
    }

    public function updateUser(){
        $dataProcessed = $this->processingDataUserForm(0);
        $response = false;
        $dataPerson = array(
            $dataProcessed[1]['dni'],
            $dataProcessed[1]['name'],
            $dataProcessed[1]['firstSurname'],
            $dataProcessed[1]['secondSurname'],
            $dataProcessed[1]['phone'],
            $dataProcessed[1]['rol'],
            $dataProcessed[1]['userName'],
            $dataProcessed[1]['machineNumber'],
            $dataProcessed[1]['email'],
            $dataProcessed[1]['dni']
        );
        try{
            $stmt = $this->connect()->prepare('CALL updatePerson(?,?,?,?,?,?)');
            $stmt->bind_param(
                'ssssss',
                $dataPerson[0],
                $dataPerson[1],
                $dataPerson[2],
                $dataPerson[3],
                $dataPerson[4],
                $dataPerson[5]
            );

            $stmt->execute();
            $this->connect()->close();

            $stmt = $this->connect()->prepare('CALL updateUser(?,?,?,?,?)');
            $stmt->bind_param(
                "sssss",
                $dataPerson[0],
                $dataPerson[6],
                $dataPerson[7],
                $dataPerson[8],
                $dataPerson[0]
            );
            $stmt->execute();
            $this->connect()->close();

            $response = true;

        }catch(Exception $error){
            echo $error;
        }
        if($response){
            echo header('location:../../users.php');
        }
    }
}
