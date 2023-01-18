<?php

include("templates/header.php");
include("templates/validationSession.php");

?>

<body>
    <div class="container w-75 mt-5">
        <!--<div class="mb-3"id="buttons">
            <button type="button" class="btn btn-success bi bi-file-earmark-excel"></button>
            <button type="button" class="btn btn-danger bi bi-filetype-pdf"></button>
        </div>-->
        <table id="myTable">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>N° Máquina</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
            </thead>
        </table>
        <a href="./newUserPage.php"><button type="button" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i> Nuevo usuario</button></a>
    </div>
</body>
<script type="module" src="js/users.js"></script>
<script type="module" src="js/functions/buttonFunctions.js"></script>
