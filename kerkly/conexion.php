<?php

$servidor= "192.168.130.37";
$NombreDB = "kerkly";
$UsaurioDB = "bdsaua";
$ContrasenaDB = "2Ut&E=adrAY7";
//$NombreDB = "kerkly";
//$UsaurioDB = "AdminKerkly";
//$ContrasenaDB = "admin kerkly001";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);
if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

}

?>