<?php
include 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idPresupuesto =$_POST['idPresupuestoNoRegistrado'];
    $PagoTotal = $_POST['PagoTotal'];
    $CURP = $_POST['CURP'];


    $ConsultaP = "UPDATE
    presupuesto_noregistrado
SET
    presupuesto_noregistrado.PagoTotal = '$PagoTotal',
    presupuesto_noregistrado.idKerklyQueACepto = '$CURP'
WHERE
    presupuesto_noregistrado.idPresupuestoNoRegistrado = '$idPresupuesto'";
    if(mysqli_query($Conexion,$ConsultaP)){
        echo 'Presupuesto enviado';
    }else{
         echo 'Error en el presupuesto';
    }
   

}

?>