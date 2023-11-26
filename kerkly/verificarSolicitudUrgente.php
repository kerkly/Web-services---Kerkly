<?php
  include_once('conexion.php');
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $idPresupuesto = $_GET['idPresupuesto'];
 
     $consultaSolicitud = "SELECT
     presupuestourgente.idPresupuesto,
     presupuestourgente.aceptoK
 
 FROM
    presupuestourgente
 WHERE
      presupuestourgente.idPresupuesto = 148";

     $resultado = mysqli_query($Conexion,$consultaSolicitud);
    
      $arrayDatos = array();
            if(isset($resultado)){
                while($fila2=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $arrayDatos [] = $fila2;
                }
                echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE); 
                $Conexion->close();
             }else{
                echo mysqli_error($Conexion);
             }
    }



?>