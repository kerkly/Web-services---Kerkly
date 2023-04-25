<?php
include 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idPresupuestoNoRegistrado =$_POST['idPresupuestoNoRegistrado'];
    $PagoTotal = $_POST['PagoTotal'];
   


    $ConsultaP = "UPDATE presupuesto_noregistrado SET PagoTotal = $PagoTotal WHERE   idPresupuestoNoRegistrado= '$idPresupuestoNoRegistrado'";
    if(mysqli_query($Conexion,$ConsultaP)){
        echo 'Presupuesto enviado';
    }else{
         echo 'Error en el presipuesto';
    }
   

//}

?>