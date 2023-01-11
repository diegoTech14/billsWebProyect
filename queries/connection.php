<?php
class Connection
{
    private $host = 'localhost';
    private $user = 'root';
    private $passw = '12345';
    private $dataBaseName = 'facturaspoderjudicial';
    public $connection;

    function __construct()
    {
        $this -> connect();
    }

    function connect()
    {
        $this-> connection = new mysqli(
            $this->host,
            $this->user,
            $this->passw,
            $this->dataBaseName
        );

        return $this -> connection;
    }

    function disconnect()
    {
        $this -> connection -> close();
    }
}
