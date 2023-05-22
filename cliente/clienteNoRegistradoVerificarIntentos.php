<?php
include_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono_NoR=$_GET['telefono_NoR'];
   // $telefono_NoR='7471503417';
 
     $ConsultaTele = "SELECT clientenoregistrado.numIntentos FROM clientenoregistrado WHERE clientenoregistrado.telefono_NoR = '$telefono_NoR'";
     $checkTele= mysqli_query($Conexion, $ConsultaTele);
     $array = array();
     if(isset($checkTele)){
         while($fila = mysqli_fetch_array($checkTele, MYSQLI_ASSOC)){
             $array[] = $fila;
         }
         echo json_encode($array, JSON_UNESCAPED_UNICODE);
         $Conexion->close();
     }else{
         echo 'Error';
     }
   
  // $Conexion->close(); 
    }

?>