<?php
include 'conexionK.php';

if($_SERVER['REQUEST_METHOD']=='GET'){

    $Consulta = "SELECT DISTINCT oficios.nombreO from oficios INNER JOIN oficio_kerkly on oficios.idOficio =
    oficio_kerkly.id_oficioK inner join kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK;";

    $Resultado = mysqli_query($Conexion, $Consulta);

    $array = array();
    if(isset($Resultado)){
        while($fila = mysqli_fetch_array($Resultado, MYSQLI_ASSOC)){
            $array[] = $fila;
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        $Conexion->close();
    }else{
        echo 'Error';
    }
}
?>