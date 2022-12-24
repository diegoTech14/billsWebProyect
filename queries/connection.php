<?php 
    $connection = new mysqli("localhost", "root", "12345", "facturaspoderjudicial");
    if($connection -> connect_errno){
        echo "Failed";
        exit();
    }
?>