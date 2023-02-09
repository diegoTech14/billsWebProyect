<?php

include("templates/header.php");
include("templates/validationSession.php");

?>

<body>
    <div class="container d-flex align-items-center justify-content-center">
        <form method="POST" action="queries/users/newUser.php">
            <h1 class="d-flex aligh-items-center justify-content-center">Nuevo usuario</h1>
            <div class="d-flex d-row">

                <div class="data-person m-2 w-50">

                    <div class="mb-3">
                        <label for="cedulaInput" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedulaInput" name="cedulaInput">
                    </div>

                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nameInput" name="nameInput">
                    </div>

                    <div class="mb-3">
                        <label for="firstSurnameInput" class="form-label">Primer apellido</label>
                        <input type="text" class="form-control" id="firstSurnameInput"
                        name="firstSurnameInput">
                    </div>

                    <div class="mb-3">
                        <label for="secondSurnameInput" class="form-label">Segundo apellido</label>
                        <input type="text" class="form-control" id="secondSurnameInput"
                        name="secondSurnameInput">
                    </div>

                    <div class="mb-3">
                        <label for="phoneInput" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="phoneInput"
                        name="phoneInput">
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


                <div class="data-user m-2">

                    <div class="mb-3">
                        <label for="userNameInput" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="userNameInput"
                        name="userNameInput">
                    </div>

                    <div class="mb-3">
                        <label for="regionalInput" class="form-label">Seleccione su regional</label>
                        <select class="form-select" id="regionalInput" name="regionalInput">
                            <option selected>Regional a la que pertenece</option>
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

                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="passwordInput"
                        name="passwordInput">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary m-2 w-50">Submit</button>
                <button type="reset" class="btn btn-warning m-2 w-50">Clear</button>
            </div>
    </div>
    </form>
    </div>
</body>