<?php
    require_once('conexionK.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $deviceID =  $_POST['deviceID'];
       // $deviceID = 'd58d4c2a9b997463';

        $consulta = "SELECT cliente.deviceID
                    FROM cliente WHERE cliente.deviceID = '$deviceID';";

        $check = mysqli_query($Conexion,$consulta);


        $array = array();
        if(isset($check)){
            while($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)){
                $array[] = $fila;
            }

            if (count($array) != 0) {
                echo 1;
            } else {
                echo 2;
            }
            $Conexion->close();
        }else{
            echo 'Error';
        }
    }

?>