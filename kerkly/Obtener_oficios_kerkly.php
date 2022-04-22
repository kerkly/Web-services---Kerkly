<?php
    include_once('conexion.php');

    if($_SERVER['REQUEST_METHOD']=='GET'){
        $curp = $_GET['curp'];
       // $curp = 'RALM981221HGRSPN01';


        $consulta = "SELECT oficios.nombreO
        from oficios INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
        INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
        WHERE kerkly.Curp = '$curp';";

        $Resultado = mysqli_query($Conexion, $consulta);

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