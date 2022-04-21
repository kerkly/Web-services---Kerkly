<?php
/**
 *  Web service que devuelve un JSON con los presupuesyos recibidos para el Ker
 */

    include 'conexionK.php';

   if($_SERVER['REQUEST_METHOD']=='GET'){
        $telefono= $_GET['telefonoCliente'];

        $Consulta = "SELECT
        presupuesto.idPresupuesto,
        presupuesto.fechaP,
        presupuesto.problema,
        presupuesto.pago_total,
        presupuesto.cuerpo_mensaje,
        presupuesto.estado,
        kerkly.Nombre,
        kerkly.Apellido_Paterno,
        kerkly.Apellido_Materno,
        kerkly.Telefono,
        direccion.Calle,
        direccion.Colonia,
        direccion.No_Exterior,
        direccion.Referencia,
        direccion.Codigo_Postal,
        cliente.Nombre AS nombre_cliente,
        cliente.Apellido_Paterno AS apellidoPaterno_cliente,
        cliente.Apellido_Materno AS apellidoNaterno_cliente,
        oficios.nombreO
    FROM
        oficios
    INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
    INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
    INNER JOIN presupuesto ON presupuesto.idOficio = oficio_kerkly.idoficio_trabajador
    INNER JOIN cliente ON presupuesto.idCliente = cliente.Correo
    INNER JOIN direccion ON cliente.Direccion_idDireccion = direccion.idDireccion
    WHERE
        cliente.telefonoCliente = '$telefono' AND (presupuesto.pago_total IS NOT NULL OR presupuesto.pago_total != 0.0;)";

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