<?php

include 'conexionK.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $telefono = $_GET['telefonoCliente'];

        $consulta = "SELECT
        oficios.nombreO,
        contrato.idContrato,
        contrato.Fecha_Inicio,
        cliente.Nombre AS cliente_nombre,
        cliente.Apellido_Paterno AS cliente_ap,
        cliente.Apellido_Materno AS cliente_am,
        kerkly.Nombre,
        kerkly.Apellido_Paterno,
        kerkly.Apellido_Materno
    FROM
        oficios
    INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
    INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
    INNER JOIN presupuesto ON presupuesto.idOficio = oficio_kerkly.idoficio_trabajador
    INNER JOIN contrato ON contrato.id_presupuesto = presupuesto.idPresupuesto
    INNER JOIN cliente ON presupuesto.idCliente = cliente.Correo
    WHERE
        cliente.telefonoCliente = '$telefono' AND contrato.Fecha_Final IS NULL";
        
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