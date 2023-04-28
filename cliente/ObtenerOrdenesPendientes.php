<?php

include 'conexionK.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $telefono = $_GET['telefonoCliente'];
        //$telefono = '7471503418';
        $consulta = "SELECT
        oficios.nombreO,
        cliente.Nombre AS cliente_nombre,
        cliente.Apellido_Paterno AS cliente_ap,
        cliente.Apellido_Materno AS cliente_am,
        kerkly.Nombre,
        kerkly.Apellido_Paterno,
        kerkly.Apellido_Materno,
        kerkly.correo_electronico,
        presupuesto.idPresupuesto
    FROM
        oficios
    INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
    INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
    INNER JOIN presupuesto ON presupuesto.idOficio = oficio_kerkly.idoficio_trabajador
        INNER JOIN cliente ON presupuesto.idCliente = cliente.Correo
    WHERE
        cliente.telefonoCliente = '$telefono' and presupuesto.aceptoCliente ='NULL'";
        
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