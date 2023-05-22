<?php
include 'conexionK.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $oficio = $_GET['oficio'];
       
       $Consulta = "SELECT
       kerkly.Curp,
       kerkly.Telefono,
       direccion.latitud,
       direccion.longitud,
       direccion.Ciudad
   FROM
       oficio_kerkly
   INNER JOIN kerkly ON oficio_kerkly.id_kerklyK = kerkly.Curp
   INNER JOIN direccionkerkly ON direccionkerkly.idKerkly = kerkly.Curp
   INNER JOIN direccion ON direccion.idDireccion = direccionkerkly.idDireccion
   INNER JOIN oficios ON oficios.idOficio = oficio_kerkly.id_oficioK
   WHERE
       oficios.nombreO = '$oficio'";

        $Resultado = mysqli_query($Conexion, $Consulta);
        $array = array();
        if(isset($Resultado)){
            while($fila =  mysqli_fetch_array($Resultado, MYSQLI_ASSOC)){
                $array[] = $fila;
            }
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
            $Conexion ->close();
        }else{
            echo 'Error';
        }


   }


?>