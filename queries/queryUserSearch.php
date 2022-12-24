<?php

    include("connection.php");
    $data = array();
    $jsonResult;
    if(isset($_POST['parameterSearch'])){
        $parameter = $_POST['parameterSearch'];

        if(ctype_digit($parameter)){
            $result = $connection -> query("CALL userSearchByCedula('$parameter');");
        }else{
            $result = $connection -> query("CALL userSearchByMachineNumber('$parameter');");
        }
        
        if($result -> num_rows != 0){
            $counter = 0;

            while($row = $result -> fetch_assoc()){
                $data[$counter] = $row;
                $counter++;
            }
            $jsonResult = json_encode($data);
        }else{
            $jsonResult = json_encode(0);
        }
    }
    
    echo $jsonResult;

?>