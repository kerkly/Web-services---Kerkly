<?php
include_once('conexion.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $Telefono = $_GET['Telefono'];

     //obtendremos la curp usando el numero de telefono
     $ConsultaObtenerCurpK = "SELECT kerkly.Curp from kerkly where kerkly.Telefono = '$Telefono'";
     $resultadoCurp = mysqli_query($Conexion,$ConsultaObtenerCurpK);
 
     if(isset($resultadoCurp)){
        while($fila= mysqli_fetch_array($resultadoCurp)){
            $curpObtenida = $fila[0];
         }
        }else{
            echo mysqli_error($Conexion);
         }
    $consultaOficio = "SELECT oficios.nombreO FROM oficio_kerkly INNER JOIN oficios on oficios.idOficio = oficio_kerkly.id_oficioK  WHERE oficio_kerkly.id_kerklyK = '$curpObtenida'";
    $resultadoOficio = mysqli_query($Conexion,$consultaOficio);
    
    $arrayDatosOficio = array();
       if(isset($resultadoOficio)){
           while($fila2=mysqli_fetch_array($resultadoOficio, MYSQLI_ASSOC)){
               $arrayDatosOficio [] = $fila2;
           }
           echo json_encode($arrayDatosOficio, JSON_UNESCAPED_UNICODE);
           $Conexion->close();
        }else{
           echo mysqli_error($Conexion);
        }
}
?>