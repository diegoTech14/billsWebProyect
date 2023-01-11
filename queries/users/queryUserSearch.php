<?php

function queryUsersSearch()
{
    include("../connection.php");
    $data = array();
    $jsonResult;
    if (isset($_POST['cedula'])) {
        $parameter = $_POST['cedula'];

        if (ctype_digit($parameter)) {
            $result = $connection->query("CALL userSearchByCedula('$parameter');");
        }

        if ($result->num_rows != 0) {
            $counter = 0;

            while ($row = $result->fetch_assoc()) {
                $data[$counter] = $row;
                $counter++;
            }
            $jsonResult = json_encode($data);
        } else {
            $jsonResult = json_encode(0);
        }
    }

    echo $jsonResult;
}

queryUsersSearch();
?>