<?php
    include("../generalRequest.php");

    function queryProviders(){
        $jsonResult = json_encode(request("CALL allProviders();"));

        echo $jsonResult;
    }
    queryProviders();
?>