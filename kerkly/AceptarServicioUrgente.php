<?php
include_once('conexion.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idPresupuesto = $_POST['idPresupuesto'];
    $Curp = $_POST['Curp'];

   // echo $idPresupuesto;
    $consulta = "UPDATE
    presupuestourgente
SET
    idKerklyAcepto='$Curp'
WHERE
    presupuestourgente.idPresupuesto = '$idPresupuesto'";

    if(mysqli_query($Conexion, $consulta)){
        echo "1";
    }else{
        echo 'Lo sentimos tenemos Problemas con el servidor';
    }

}
?>