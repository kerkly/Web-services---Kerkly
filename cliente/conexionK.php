<?php

$servidor= "localhost";
$NombreDB = "kerkly";
$UsaurioDB = "AdminKerkly";
$ContrasenaDB = "admin kerkly001";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);
if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

}else{
   // echo 'todo bien';
}

/*
$consulta ="SELECT * from cliente";
$resultado = mysqli_query($Conexion, $consulta);

$arrayDatos = array();
while($fila= mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
   $arrayDatos [] = $fila;

}
echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);

$Conexion->close();*/
?>
