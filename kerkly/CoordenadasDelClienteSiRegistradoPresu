<?php
include 'conexion.php';
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
   $telefono = $_GET['telefono'];
    $Consulta = "SELECT cliente.Nombre, direccion.latitud, direccion.longitud FROM cliente  INNER JOIN direccion on direccion.idDireccion = cliente.Direccion_idDireccion WHERE cliente.telefonoCliente = $telefono";

    $Resultado = mysqli_query($Conexion, $Consulta);
    $array = array();
    if(isset($Resultado)){
        while($fila =  mysqli_fetch_array($Resultado, MYSQLI_ASSOC)){
            $array[] = $fila;
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        $Conexion ->close();
    }else{
        echo 'Error';
    }
}
?>