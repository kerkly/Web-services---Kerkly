<?php
 require_once('conexionK.php');

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['Correo'];
    $deviceID = $_POST['deviceID'];
    $uidCliente = $_POST['uidCliente'];

    $consulta = "UPDATE cliente SET cerroSesion = '1', deviceID = '$deviceID', uidCliente= '$uidCliente' WHERE cliente.Correo = '$correo'";

    if(mysqli_query($Conexion, $consulta)) {
        echo 1;
    } else {
        echo 2;
    }

}

?>