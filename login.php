<?php
    include("templates/header.php");
    session_start();

    session_destroy();
?>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100" id="container-form">
            <div id="generalForm" class="w-25">
                <div>
                    <img src="src/logo-poder-judicial.png" alt="" class="w-100">
                </div>
      
                <form action="functions/loginFunctionality.php" method="POST" class="d-flex align-items-center flex-column">
                    <div class="input-group">
                        <span class="input-group-text" id="user-icon"><i class="fa-solid fa-id-card"></i></span>
                        <input type="text" class="form-control" placeholder="Cedula" aria-describedby="user-icon" name="DNI">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="password-icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="password-icon" name="password">
                    </div>

                    <button type="submit" class="btn btn-outline-primary mt-4">Ingresar</button>
                </form>
            </div>
        </div>
    </body>
</html>