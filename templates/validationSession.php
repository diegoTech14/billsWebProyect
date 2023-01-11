<?php

session_start();

if(!isset($_SESSION['user_name'])){
    header("location: login.php");
}

if ($_SESSION["rol"] != "Jefe Superior") {
    include("templates/notAdminInterface/navbarNotAdmin.php");
} else {
    include("templates/navbar.php");
}
?>