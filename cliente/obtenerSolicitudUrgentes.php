<?php
include 'conexionK.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $telefono = $_GET['telefonoCliente'];
    $consulta = "SELECT
    oficios.nombreO,
    cliente.Nombre,
    cliente.Apellido_Paterno,
    cliente.Apellido_Materno,
    presupuestourgente.idPresupuesto,
    presupuestourgente.pago_total,
    presupuestourgente.problema,
    presupuestourgente.fechaP,
    presupuestourgente.idKerklyAcepto
FROM
    oficios
INNER JOIN oficio_kerkly ON oficios.idOficio = oficio_kerkly.id_oficioK
INNER JOIN presupuestourgente ON presupuestourgente.idOficio = oficio_kerkly.idoficio_trabajador
INNER JOIN cliente ON presupuestourgente.idCliente = cliente.Correo
WHERE
    cliente.telefonoCliente = '$telefono' AND (presupuestourgente.trabajoTerminado = 0 OR presupuestourgente.idKerklyAcepto IS NULL)";

    $check = mysqli_query($Conexion, $consulta);

    $array = array();
    if (isset($check)) {
        while ($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)) {
            $array[] = $fila;
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        $Conexion->close();
    } else {
        echo 'Error';
    }
    
}
?>