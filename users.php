<?php

include("templates/header.php");
include("templates/validationSession.php");

?>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="queries/users/updateUser.php">
                        <h1 class="d-flex aligh-items-center justify-content-center">Actualizar datos</h1>
                        <div class="d-flex d-row">

                            <div class="data-person m-2 w-50">
                                
                                <div class="mb-3">
                                    <label for="cedulaInput" class="form-label">Cedula</label>
                                    <input type="text" class="form-control" id="cedulaInput" readonly name="cedulaInput">
                                </div>

                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nameInput" name="nameInput">
                                </div>

                                <div class="mb-3">
                                    <label for="firstSurnameInput" class="form-label">Primer apellido</label>
                                    <input type="text" class="form-control" id="firstSurnameInput" name="firstSurnameInput">
                                </div>

                                <div class="mb-3">
                                    <label for="secondSurnameInput" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" id="secondSurnameInput" name="secondSurnameInput">
                                </div>

                                <div class="mb-3">
                                    <label for="phoneInput" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="phoneInput" name="phoneInput">
                                </div>

                                <div class="mb-3">
                                    <label for="rolInput" class="form-label">Puesto que ocupa</label>
                                    <select class="form-select" name="rolInput" id="rolInput">
                                        <option selected>Seleccione el puesto</option>
                                        <option value="1">Jefe superior</option>
                                        <option value="2">Jefe</option>
                                        <option value="3">Técnico</option>
                                    </select>
                                </div>

                            </div>


                            <div class="data-user m-2 w-50">

                                <div class="mb-3">
                                    <label for="userNameInput" class="form-label">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="userNameInput" name="userNameInput">
                                </div>

                                <div class="mb-3">
                                    <label for="regionalInput" class="form-label">Seleccione su regional</label>
                                    <select class="form-select" id="regionalInput" name="regionalInput">
                                        <option selected="Regional">Regional a la que pertenece</option>
                                        <option value="0">San José</option>
                                        <option value="1">Heredia</option>
                                        <option value="2">Puntarenas</option>
                                        <option value="3">Guanacaste</option>
                                        <option value="4">Alajuela</option>
                                        <option value="5">Limón</option>
                                        <option value="6">Cartago</option>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="machineNumberInput" class="form-label">Número de máquina</label>
                                    <input type="text" class="form-control" id="machineNumberInput" name="machineNumberInput">
                                </div>

                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="emailInput" name="emailInput">
                                </div>

                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary m-2 w-50">Update User</button>
                            <button type="reset" class="btn btn-warning m-2 w-50">Clear</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container w-75 mt-5">
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