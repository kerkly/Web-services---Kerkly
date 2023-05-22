<?php
include_once('conexionK.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefono_NoR = $_POST['telefono_NoR'];
    $nombre_noR = $_POST['nombre_noR'];
    $apellidoP_noR = $_POST['apellidoP_noR'];
    $apellidoM_noR = $_POST['apellidoM_noR'];


    $consulta = "UPDATE
    clientenoregistrado
SET clientenoregistrado.nombre_noR = '$nombre_noR',
        clientenoregistrado.apellidoP_noR= '$apellidoP_noR',
        clientenoregistrado.apellidoM_noR = '$apellidoM_noR'
WHERE
    clientenoregistrado.telefono_NoR = '$telefono_NoR'";

    $consultarInsert2 = mysqli_query($Conexion, $consulta);
    if (isset($consultarInsert2)) {
        echo 'Nombre Ingresado';
    }
}
