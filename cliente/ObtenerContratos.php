<?php

include 'conexionK.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $telefono = $_GET['telefonoCliente'];

        $consulta = "SELECT oficios.nombreO, contrato.idContrato, contrato.Fecha_Inicio, contrato.Fecha_Final, cliente.Nombre, 
        cliente.Apellido_Paterno, cliente.Apellido_Materno, kerkly.Nombre, kerkly.Apellido_Paterno, kerkly.Apellido_Materno from oficios 
        INNER JOIN oficio_kerkly on oficios.idOficio = oficio_kerkly.id_oficioK INNER JOIN kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK 
        INNER JOIN presupuesto on presupuesto.idOficio = oficio_kerkly.idoficio_trabajador INNER JOIN contrato on 
        contrato.id_presupuesto = presupuesto.idPresupuesto INNER JOIN cliente on presupuesto.idCliente = cliente.Correo WHERE 
        cliente.telefonoCliente = '$telefono'";
        
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