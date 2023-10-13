<?php

include 'conexionK.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $telefono = $_GET['telefonoCliente'];
   // $telefono = '7471503418';
    $consulta = "SELECT
    oficios.nombreO,
    kerkly.Nombre,
    kerkly.Apellido_Paterno,
    kerkly.Apellido_Materno,
    kerkly.correo_electronico,
    kerkly.Telefono,
    kerkly.uidKerkly,
    direccion.Pais,
    direccion.Ciudad,
    direccion.Colonia,
    direccion.Calle,
    presupuesto.idPresupuesto,
    presupuesto.pago_total,
    presupuesto.problema,
    presupuesto.fechaP,
    presupuesto.aceptoCliente
   
FROM
    oficios
INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
INNER JOIN direccionkerkly ON direccionkerkly.idKerkly = kerkly.Curp
INNER JOIN direccion ON direccion.idDireccion = direccionkerkly.idDireccion
INNER JOIN presupuesto ON presupuesto.idOficio = oficio_kerkly.idoficio_trabajador
INNER JOIN cliente ON presupuesto.idCliente = cliente.Correo
WHERE
    cliente.telefonoCliente = '$telefono' AND presupuesto.trabajoTerminado = 0";

    $check = mysqli_query($Conexion, $consulta);

    $array = array();
    if (isset($check)) {
        while ($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)) {
            $array[] = $fila;
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        //echo 'nadaaa  5 ' + $check;

        $Conexion->close();
    } else {
        echo 'Error';
    }
}
