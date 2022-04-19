<?php
    require_once('conexionK.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $correo = $_POST['correo'];
       // $correo = "ejemplo@ejemplo.com";

        $consulta = "UPDATE cliente set cerroSesion = 0 WHERE cliente.Correo = '$correo';";

        if(mysqli_query($Conexion, $consulta)) {
            echo 1;
        } else {
            echo 2;
        }
    }
?>