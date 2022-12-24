<?php

include('connection.php');
function allBills()
{
    global $connection;
    $result = $connection->query("CALL allEarringBills();");

    return $result;
}

function showBills($bills)
{
    $data = "";
?>
    <div class=" container my-3 p-3 bg-body rounded shadow-sm d-flex flex-column justify-content-center align-items-center">
        <h3 class="">Facturas</h3>
        <?php
        $statusLabel = "";
        for ($i = 0; $i < ($bills->num_rows); $i++) {
            $row = $bills->fetch_assoc();
                $data .= "
                <div class='card my-4 w-50'>
                    <h5 class='card-header'>".$row["id_factura"] ." | ".$row["periodo_presupuestario"]."</h5>
                    <div class='card-body'>
                        <p class='card-text'>".$row["observaciones"]."</p>
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


    /*function allUsersByCedulaDESC(){
      global $connection;
      $result = $connection -> query("CALL allUsersByCedulaDESC();");
  
      return $result;
    }

    function showAllUsers($users){
        echo '
        <div class="mt-5 w-100 p-3">
        <label for="basic-url" class="form-label">Buscar</label>
        
        <div class="input-group mb-3 w-25">
          <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
        </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Cedula <button class="btn btn-light"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col">Nombre completo <button class="btn btn-light"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col">Nombre de usuario <button class="btn btn-light"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col">Número de máquina <button class="btn btn-light"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col">Estado<button class="btn btn-light"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col"></th>
            </tr>
          </thead>

        <tbody>';
          while($row = $users -> fetch_assoc()){
            $complete_name = $row["nombre"] . " " . $row["apellido_uno"] . " " . $row["apellido_dos"];
            echo '<tr>
            <th scope="row">'.$row["cedula"].'</th>
            <td>'.$complete_name.'</td>
            <td>'.$row["nombre_usuario"].'</td>
            <td>'.$row["numero_maquina"].'</td>
            <td>'.$row["estado"].'</td>
            <td>
                <button class="btn btn-danger">Deshabilitar</button>
                <button class="btn btn-success">Actualizar</button>
            </td>
          </tr>';
        }

          echo '</tr>
        </tbody>
      </table>
      </div>';
    }

    function formCreateUSer(){
        echo '
        
        <div class="w-50 mt-5 p-3">
        <h2>Crear nuevo usuario</h2>
        <form>

          <div class="mb-3">
            <label for="inputCedula" class="form-label">Cedula</label>
            <input type="text" class="form-control" id="inputCedula">
          </div>

          <div class="mb-3">
            <label for="inputName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="inputName">
          </div>



          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

          </form>
        </div>
        ';
    }*/
?>