<?php 
    session_start();

    include('../queries/connection.php');
    include('hashingPassword.php');

    //This method returns the hashedPassword from the database using the DNI
    function getCryptedPasswordFromDatabase($DNI){
        global $connection;
        if(isset($_POST['DNI'])){
            $result = $connection -> query("SELECT usuarios.contraseña FROM usuarios WHERE usuarios.cedula_persona = '$DNI'");
            
            if($result){
                $row = $result -> fetch_array();
                    return $row["contraseña"];
            }
        }
    }

    //103580137
    //hulkeate99

    //This method compares the hashedPassword with the password get in from the form
    function login(){
        $login_status = false;
        if(isset($_POST['DNI']) AND isset($_POST['password'])){

            global $connection;
            $DNI = $_POST['DNI'];
            $password = $_POST['password'];

            //hashedPassword from the database
            $passwordResult = getCryptedPasswordFromDatabase($DNI);

                if(verifyHashedPassword($password, $passwordResult) AND $passwordResult){
                    
                    $result = $connection -> query("SELECT usuarios.nombre_usuario, personas.puesto, usuarios.numero_maquina FROM usuarios INNER JOIN personas ON usuarios.cedula_persona = personas.cedula 
                    WHERE usuarios.cedula_persona = '$DNI' AND usuarios.contraseña = '$passwordResult';");

                    if($result){
                        // for each result, will be create its respectives session variables
                        while($row = $result -> fetch_assoc()){ 
                            $_SESSION["user_name"] = $row["nombre_usuario"];
                            $_SESSION["machine_number"] = $row["numero_maquina"];
                            $_SESSION["rol"] = $row["puesto"];
                            
                            header("location: ../index.php");
                        }
                    }
                }else{
                    header("location: ../login.php");
                }
            
        }
    return $login_status;
}
login();
?>