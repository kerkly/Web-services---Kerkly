<?php

include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Telefono = $_POST['Telefono'];
    $deviceID = $_POST['deviceIDk'];
    $uidKerkly = $_POST['uidKerkly'];

    $consulta = "UPDATE kerkly SET cierraSesion = '1', deviceIDk = '$deviceID', uidKerkly = '$uidKerkly' WHERE kerkly.Telefono = '$Telefono';";

    if(mysqli_query($Conexion, $consulta)) {
        echo 1;
    } else {
        echo 2;
    }

}
?>