<?php
include 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idPresupuesto  =$_POST['idPresupuesto'];
    $PagoTotal = $_POST['pago_total'];

    /*$idPresupuesto  =3;
    $PagoTotal = 100;
*/

    $ConsultaP = "UPDATE presupuesto SET pago_total = $PagoTotal WHERE idPresupuesto = '$idPresupuesto';";

    $resultado = mysqli_query($Conexion,$ConsultaP) or die (mysqli_error ($Conexion));
    if(isset($resultado)){
        echo 'Presupuesto enviado';
    }else{
         echo 'Error en el presupuesto';
    }
   

}

?>