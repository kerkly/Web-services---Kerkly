<?php
include 'conexionK.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $oficio = $_GET['oficio'];
        $Consulta = "SELECT kerkly.Curp, direccion.latitud, direccion.longitud from oficio_kerkly INNER JOIN kerkly on 
        oficio_kerkly.id_kerklyK = kerkly.Curp INNER JOIN direccionkerkly on direccionkerkly.idKerkly  = kerkly.Curp INNER JOIN 
        direccion on direccion.idDireccion = direccionkerkly.idDireccion  INNER JOIN oficios on oficios.idOficio = oficio_kerkly.id_oficioK 
        where oficios.nombreO = '$oficio'";

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