<?php

$servidor= "localhost";
$NombreDB = "bdsaua";
$UsaurioDB = "usrsaua";
$ContrasenaDB = "AmorMio15$&";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);

if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);
}
?>