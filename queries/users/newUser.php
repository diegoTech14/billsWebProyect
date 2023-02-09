<?php
$absolutePathArray = explode("\\",__DIR__);
$absolutePath = "";

foreach(array_slice($absolutePathArray,0, 5) as $element){
    $absolutePath .= $element . "\\";
}
include($absolutePath."users/usersQueries.php");
$object = new UsersQueries();
$object -> createNewUser();

?>