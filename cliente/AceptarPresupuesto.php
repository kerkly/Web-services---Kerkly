<?php
    require_once('conexionK.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idPresupuestoNoRegistrado = $_POST['idPresupuestoNoRegistrado'];
        $aceptoCliente =$_POST['aceptoCliente'];
        $numIntentos =$_POST['numIntentos'];
        $telefono_NoR =$_POST['telefono_NoR'];

        $Consulta = "UPDATE presupuesto_noregistrado SET aceptoCliente = '$aceptoCliente' WHERE idPresupuestoNoRegistrado ='$idPresupuestoNoRegistrado'";
       // echo 'entro';
       if(mysqli_query($Conexion,$Consulta)){
           $sql = "INSERT INTO contrato_noregistrado (Fecha_Inicio_NoRegistrado, presupuesto_noR) VALUES (NOW(), '$idPresupuestoNoRegistrado')";
           $ejecutado = mysqli_query($Conexion, $sql);
           if($ejecutado==1){
              echo 'Presupuesto Aceptado';
           }else{
              echo 'error';
           }
       
    }else {
        echo 'error';
    }

    $con = "UPDATE clientenoregistrado SET numIntentos = $numIntentos WHERE telefono_NoR ='$telefono_NoR'";

    if(mysqli_query($Conexion, $con)) {
        echo 1;
    } else {
        echo 0;
    }

}
?>