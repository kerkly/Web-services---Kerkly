<?php

$servidor= "192.168.130.37";
//$NombreDB = "kerkly";
$NombreDB = "bdsaua";
//$UsaurioDB = "AdminKerkly";
$UsaurioDB = "usersaua";
$ContrasenaDB = "2Ut&E=adrAY7";
//$ContrasenaDB = "admin kerkly001";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);
if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

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
