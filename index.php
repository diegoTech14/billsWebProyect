<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
</head>

<?php

    include("templates/header.php");
    include("templates/validationSession.php");
    include("queries/billsQueries.php");
    //include("queries/users/userQueryObject.php");
?>

<body>
    <?php        
        if(isset($_SESSION["user_name"])){
            $billsQueries = new BillsQueries();
            $billsQueries -> showBills();
        }else{
            header("location: login.php");
        }
    ?>
</body>
</html>