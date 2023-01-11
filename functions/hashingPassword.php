<?php 

    function hashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    function verifyHashedPassword($password, $hashedPassword){
        return password_verify($password, $hashedPassword);
    }

?>