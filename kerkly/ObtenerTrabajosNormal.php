<?php

include_once('conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
    $Telefono=$_GET['Telefono'];

    $Consulta = "SELECT
    cliente.Nombre,
    cliente.Apellido_Paterno,
    cliente.Apellido_Materno,
    cliente.telefonoCliente,
    cliente.Correo,
    cliente.uidCliente,
    presupuesto.problema,
    presupuesto.idPresupuesto,
    presupuesto.fechaP,
    direccion.Ciudad,
    direccion.Estado,
    direccion.Pais,
    direccion.Calle,
    direccion.Colonia,
    direccion.No_Exterior,
    direccion.Codigo_Postal,
    direccion.Referencia
FROM
    presupuesto
INNER JOIN oficio_kerkly ON presupuesto.idOficio = oficio_kerkly.idoficio_trabajador
INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
INNER JOIN cliente ON cliente.Correo = presupuesto.idCliente
INNER JOIN direccion ON direccion.idDireccion = cliente.Direccion_idDireccion
WHERE
    kerkly.Telefono = '$Telefono' and presupuesto.aceptoCliente = 1 and presupuesto.trabajoTerminado = '0'";

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