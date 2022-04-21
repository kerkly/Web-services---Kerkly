<?php
    include_once('conexion.php');
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $telefono = $_GET['telefono'];
        //$telefono = '7470006061';

        $consulta = "SELECT kerkly.Curp,
        kerkly.Nombre,
        kerkly.Apellido_Paterno,
        kerkly.Apellido_Materno,
        kerkly.correo_electronico
        FROM kerkly WHERE kerkly.Telefono = '$telefono';";

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