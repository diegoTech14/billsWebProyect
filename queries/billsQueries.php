<?php

include ("connection.php");

class BillsQueries extends Connection
{

  private function allBills()
  {
    $result = $this -> connect() -> query("CALL allEarringBills();");
    return $result;
  }

  function showBills()
  {
    $bills = $this -> allBills();
    $data = "";
?>
    <div class=" container my-3 p-3 bg-body rounded shadow-sm d-flex flex-column justify-content-center align-items-center">
      <h3 class="">Facturas</h3>
      <?php
      for ($i = 0; $i < ($bills->num_rows); $i++) {
        $row = $bills->fetch_assoc();
        $data .= "
                <div class='card my-4 w-50'>
                    <h5 class='card-header'>" . $row["id_factura"] . " | " . $row["periodo_presupuestario"] . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $row["observaciones"] . "</p>
                    <a href='#' class='btn btn-secondary'>Detail</a>
                    <a href='#' class='btn btn-primary'>Approve</a>
                </div>
            </div>";
      }
      echo $data;
      ?>
    </div>
<?php
  }
}
?>