<?php
include 'conexionK.php';

if($_SERVER['REQUEST_METHOD']=='GET') {
    $telefono_NoR = $_GET['telefono_NoR'];

    $consulta = "SELECT clientenoregistrado.nombre_noR, clientenoregistrado.apellidoP_noR,
     clientenoregistrado.apellidoM_noR, clientenoregistrado.numIntentos FROM
     clientenoregistrado WHERE clientenoregistrado.telefono_NoR = '$telefono_NoR'";

     $check = mysqli_query($Conexion,$consulta);

     $array = array();
    if(isset($check)){
        while($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)){
            $array[] = $fila;
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        $Conexion->close();
    }else{
        echo 'Error';
   }
}
?>