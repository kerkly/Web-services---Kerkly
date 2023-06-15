<?php
include 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idPresupuesto  =$_POST['idPresupuesto'];
    $PagoTotal = $_POST['pago_total'];
   

    $ConsultaP = "UPDATE presupuesto SET presupuesto.pago_total = '$PagoTotal', presupuesto.trabajoTerminado ='0' WHERE idPresupuesto = '$idPresupuesto'";

    $resultado = mysqli_query($Conexion,$ConsultaP) or die (mysqli_error ($Conexion));
    if(isset($resultado)){
        echo 'pago enviado';
    }else{
         echo 'Error ';
    }
   

}

?>