
<?php

include("connection.php");
$data = array();
$result = $connection->query("CALL allUsers();");
$counter = 0;

while ($row = $result->fetch_assoc()) {
  $data[$counter] = $row;
  $counter++;
}
//sending the array in json format
$jsonResult = json_encode($data);
echo $jsonResult;

?>

