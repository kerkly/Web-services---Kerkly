<?php
require_once('conexionK.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $deviceID = $_POST['deviceID'];
   // $deviceID = '078af184a5ef9078';
    $consulta = "SELECT cliente.telefonoCliente from cliente where cliente.deviceID = '$deviceID' and cerroSesion = '1'";
    $check = mysqli_query($Conexion,$consulta);
   

    if(isset($check)){ 
        $telefono = "0";
        while($fila= mysqli_fetch_array($check)){
            $telefono = $fila[0];
        } 
        echo $telefono;
        
    } else {
        echo 0;
    }

}

?>