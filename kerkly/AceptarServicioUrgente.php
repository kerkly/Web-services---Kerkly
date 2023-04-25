<?php
include_once('conexion.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idPresupuestoNoRegistrado = $_POST['idPresupuestoNoRegistrado'];
    $kerkly_aceptado = $_POST['kerkly_aceptado'];

    $consulta = "UPDATE presupuesto_noregistrado set presupuesto_noregistrado.kerkly_aceptado = $kerkly_aceptado WHERE presupuesto_noregistrado.idPresupuestoNoRegistrado =$idPresupuestoNoRegistrado";

    if(mysqli_query($Conexion, $consulta)){
        echo $kerkly_aceptado;
    }

}
?>