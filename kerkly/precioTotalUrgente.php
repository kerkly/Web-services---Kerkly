<?php
include 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idPresupuesto =$_POST['idPresupuesto'];
    $PagoTotal = $_POST['PagoTotal'];
   


    $ConsultaP = "UPDATE
    presupuestourgente
SET
    presupuestourgente.pago_total = '$PagoTotal'
WHERE
    presupuestourgente.idPresupuesto = '$idPresupuesto'";
    if(mysqli_query($Conexion,$ConsultaP)){
        echo 'Presupuesto enviado';
    }else{
         echo 'Error en el presupuesto';
    }
   

}

?>