<?php
    include("../users/usersQueries.php");
    $queryObject = new UsersQueries();
    echo $queryObject -> enableUser();
