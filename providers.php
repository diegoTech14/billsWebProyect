<?php 

    include("templates/header.php");
    include("templates/validationSession.php");

?>

<div class="container w-75 mt-75">

    <div id="wrapper"></div>
    <button class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i> Nuevo proveedor</button>

    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <script type="module" src="./js/providers.js"></script>
</div>