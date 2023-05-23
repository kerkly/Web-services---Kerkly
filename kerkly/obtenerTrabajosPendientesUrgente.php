<?php

include_once('conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono=$_GET['Telefono'];

    $Consulta = "SELECT
    presupuestourgente.idPresupuesto,
    presupuestourgente.problema,
    presupuestourgente.fechaP,
    cliente.Nombre,
    cliente.Apellido_Paterno,
    cliente.Apellido_Materno,
    cliente.telefonoCliente,
    cliente.Correo,
    direccion.latitud,
    direccion.longitud,
    direccion.Ciudad,
    direccion.Estado,
    direccion.Pais,
    direccion.Calle,
    direccion.Colonia,
    direccion.No_Exterior,
    direccion.Codigo_Postal,
    direccion.Referencia,
    oficios.nombreO
FROM
    presupuestourgente
INNER JOIN oficio_kerkly ON presupuestourgente.idOficio = oficio_kerkly.id_oficioK
INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
INNER JOIN cliente ON cliente.Correo = presupuestourgente.idCliente
INNER JOIN direccion ON direccion.idDireccion = cliente.Direccion_idDireccion
INNER JOIN oficios ON oficios.idOficio = oficio_kerkly.id_oficioK
WHERE
    kerkly.Telefono = '$telefono' AND presupuestourgente.aceptoCliente = '1'";

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