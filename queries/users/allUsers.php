<?php
  include("./usersQueries.php");
  $userQueries = new UsersQueries();
  echo $userQueries -> allUsers();
?>

