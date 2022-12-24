<?php 

    function hashPassword($password){
        return password_hash("hulkeate99", PASSWORD_BCRYPT);
    }
    
    function verifyHashedPassword($password, $hashedPassword){
        return password_verify($password, $hashedPassword);
    }

?>