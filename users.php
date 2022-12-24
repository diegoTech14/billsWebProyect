<?php

session_start();

include("templates/header.php");


if ($_SESSION["rol"] != "Jefe Superior") {
    include("templates/notAdminInterface/navbarNotAdmin.php");
} else {
    include("templates/navbar.php");
}

?>

<body>
    <?php
    ?>
    <div class="container">

        <!-- bar search -->
        <div class="mt-5 w-100 p-3">
            <label for="basic-url" class="form-label">Buscar por cedula o número de máquina</label>

            <div class="input-group mb-3 w-25">
                <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" id="parameterSearch" name="parameterSearch" aria-describedby="basic-addon3">
            </div>
        </div>

        <!-- table -->
        <div id="tableUsers">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cedula
                            <button class="btn btn-light" id="orderingCedula"><i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th scope="col">Nombre completo
                            <button class="btn btn-light" id="orderingName"><i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th scope="col" class="pb-3">Nombre de usuario</th>
                        <th scope="col" class="pb-3">Número de máquina</th>
                        <th scope="col">Estado
                            <button class="btn btn-light" id="orderingStatus"><i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>


            </table>
        </div>
        <div class="d-flex d-column justify-content-center aling-items-center"id="panelPagination">
                <div id="arrow-left">
                    <button class="btn btn-light" id="left-btn"><i class="fa-solid fa-arrow-left"></i></button>
                </div>
                <div class="d-flex d-column pt-1" id="numbers">
                    
                </div>
                <div id="arrow-right">
                    <button class="btn btn-light" id="right-btn"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
    </div>

    <script type="module" src="js/usersFetch.js"></script>
</body>