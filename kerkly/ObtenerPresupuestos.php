<?php

include_once('conexion.php');
if($_SERVER['REQUEST_METHOD']=='GET'){

    $Telefono = $_GET['Telefono'];

    $consultaPresupuesto = "SELECT
    presupuesto.problema,
    cliente.telefonoCliente,
    cliente.Nombre,
    cliente.Apellido_Paterno,
    cliente.Apellido_Materno,
    cliente.Correo,
    direccion.latitud,
    direccion.longitud,
    direccion.Calle,
    direccion.Colonia,
    direccion.No_Exterior,
    direccion.Codigo_Postal,
    direccion.Referencia,
    presupuesto.fechaP,
    presupuesto.idPresupuesto
FROM
    kerkly
INNER JOIN oficio_kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
INNER JOIN presupuesto ON oficio_kerkly.idoficio_trabajador = presupuesto.idOficio
INNER JOIN cliente ON presupuesto.idCliente = cliente.Correo
INNER JOIN direccion ON cliente.Direccion_idDireccion = direccion.idDireccion
WHERE
    kerkly.Telefono = '$Telefono' AND presupuesto.pago_total IS NULL || presupuesto.pago_total = 0.0";

    $resultado = mysqli_query($Conexion,$consultaPresupuesto);
    $arrayDatos = array();
    if(isset($resultado)){
        while($fila2=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $arrayDatos [] = $fila2;
        }
        echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
        $Conexion->close();
    }else{
        echo "error";
        echo mysqli_error($Conexion);
    }


} 

?>