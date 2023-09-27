<?php

$servidor= "localhost";
$NombreDB = "kerkly";
$UsaurioDB = "AdminKerkly";
$ContrasenaDB = "admin kerkly001";

/*$servidor= "localhost";
$NombreDB = "u544842673_kerkly";
$UsaurioDB = "u544842673_kerkly";
$ContrasenaDB = "Kerkly2023";*/

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);

if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

}

?>