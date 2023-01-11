<?php
function request($query)
{
  include("../connection.php");
  $data = array();
  $result = $connection->query($query);
  $counter = 0;

  while ($row = $result->fetch_assoc()) {
    $data[$counter] = $row;
    $counter++;
  }

  return $data;
}
