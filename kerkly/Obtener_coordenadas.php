<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $curp = $_GET['curp'];

        $consulta = "SELECT direccion.longitud,
        direccion.latitud
        FROM kerkly INNER JOIN direccionkerkly ON kerkly.Curp = direccionkerkly.idKerkly INNER JOIN
        direccion ON direccionkerkly.idDireccion = direccion.idDireccion WHERE kerkly.Curp = '$curp'";

        $check = mysqli_query($Conexion,$consulta);

        $array = array();

        if(isset($check)){
            while($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)){
                $array[] = $fila;
            }
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
            $Conexion->close();
        }else{
            echo 'Error';
        }
    }

?>