<?php

$servidor= "localhost";
$NombreDB = "bdsaua";
$UsaurioDB = "usrsaua";
$ContrasenaDB = "AmorMio15$&";

$Conexion = mysqli_connect($servidor, $UsaurioDB, $ContrasenaDB,$NombreDB);

if($Conexion->connect_error){
    die("fallo la conexion" .$Conexion->connect_error);

}else{
   // echo 'todo bien';
}


$consulta ="SELECT * from cliente";
$resultado = mysqli_query($Conexion, $consulta);

$arrayDatos = array();
while($fila= mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
   $arrayDatos [] = $fila;


}

?>
