<?php

$servidor= "localhost";
$NombreDB = "kerkly";
$UsaurioDB = "AdminKerkly";
$ContrasenaDB = "admin kerkly001";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);
if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

}

?>