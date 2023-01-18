<?php

//INVESTIGAR ESTO Y BUSCAR ENTENDER MEJOR COMO FUNCIONAN LOS INCLUDE
$absolutePathArray = explode("\\",__DIR__);
$absolutePath = "";

foreach(array_slice($absolutePathArray,0, 5) as $element){
    $absolutePath .= $element . "\\";
}

include ($absolutePath."connection.php");

class UsersQueries extends Connection{
    private function closeConnection()
    {
        $this -> connect() -> close();
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
        $this -> closeConnection();
        
        $jsonResult = json_encode($data);
        return $jsonResult;
    }

    public function disableUser()
    {

        $response = 0;

        if (isset($_POST['cedula'])) {
            $parameter = $_POST['cedula'];
            $this->connect()->query("CALL disableUser($parameter);");
            $response = 1;
        }
        $this -> closeConnection();
        echo $response;
    }

    public function enableUser()
    {
        $response = 0;

        if (isset($_POST['cedula'])) {
            $parameter = $_POST['cedula'];
            $this->connect()->query("CALL enableUser($parameter);");
            $response = 2;
        }

        $this -> closeConnection();
        echo $response;
    }

    public function createNewUser(){
        $response = 0;

        //if(isset($_POST['']))
        try{
            
        }catch (Exception $exception){

        }
    }

    public function getAllPeopleTelephones(){
        $result = $this -> connect() -> query("CALL getAllPeopleTelephones();");
        $this -> closeConnection();
        
        $numbers = array();
        $counter = 0;

        while ($row = $result->fetch_column()) {
            $numbers[$counter] = $row;
            $counter++;
        }

        $json_result = json_encode($numbers);
        return $json_result;
        
    }
}
