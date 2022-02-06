<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deviceID = $_POST['deviceIDk'];

    $consulta = "SELECT kerkly.Telefono from kerkly where kerkly.deviceIDk = '$deviceID' and cierraSesion = '1'";

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