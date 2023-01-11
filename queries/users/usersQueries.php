<?php

include("../connection.php");

class UsersQueries extends Connection
{
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
        //sending the array in json format
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
}
