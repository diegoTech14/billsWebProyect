<?php

include("templates/header.php");
include("templates/validationSession.php");

?>
<body>
    <div class="container w-75 mt-5">
        <div id="wrapper"></div>
        <button class="btn btn-primary mt-3" id="refresh"><i class="fa-solid fa-user-plus"></i> Nuevo usuario</button>
    </div>
</body>
<script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
<script type="module" src="js/users.js"></script>