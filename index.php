<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
</head>

<?php
    session_start();

    include("templates/header.php");
    include("queries/queryBills.php");

    if($_SESSION["rol"] != "Jefe Superior"){
        include("templates/notAdminInterface/navbarNotAdmin.php");
    }else{
        include("templates/navbar.php");
    } 
?>

<body>
    <?php        
        if(isset($_SESSION["user_name"])){
            showBills(allBills());
        }else{
            header("location: login.php");
        }
    ?>
</body>
</html>