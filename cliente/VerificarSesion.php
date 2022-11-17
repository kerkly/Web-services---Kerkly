<?php
require_once('conexionK.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deviceID = $_POST['deviceID'];
    $consulta = "SELECT cliente.telefonoCliente from cliente where cliente.deviceID = '$deviceID' and cerroSesion = '1'";

    $check = mysqli_query($Conexion,$consulta);

    if(isset($check)){ 
        $hash = "0";
        while($fila= mysqli_fetch_array($check)){
            $hash = $fila[0];
        } 

        echo $hash;
    } else {
        echo 0;
    }

}

?>