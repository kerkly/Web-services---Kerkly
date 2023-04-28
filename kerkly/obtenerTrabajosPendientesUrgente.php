<?php

include_once('conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono_NoR=$_GET['Telefono'];

    $Consulta = "SELECT
    cliente.Nombre,
    cliente.Apellido_Paterno,
    cliente.Apellido_Materno,
    cliente.telefonoCliente,
    cliente.Correo,
    presupuesto_noregistrado.problema,
    presupuesto_noregistrado.idPresupuestoNoRegistrado,
    presupuesto_noregistrado.fechaPresupuesto,
    direccion.Ciudad,
    direccion.Estado,
    direccion.Pais,
    direccion.Calle,
    direccion.Colonia,
    direccion.No_Exterior,
    direccion.Codigo_Postal,
    direccion.Referencia
FROM
    presupuesto_noregistrado
INNER JOIN oficio_kerkly ON presupuesto_noregistrado.idOficio = oficio_kerkly.idoficio_trabajador
INNER JOIN kerkly ON kerkly.Curp = oficio_kerkly.id_kerklyK
INNER JOIN cliente ON cliente.Correo = presupuesto_noregistrado.idCliente
INNER JOIN direccion ON direccion.idDireccion = cliente.Direccion_idDireccion
WHERE
    kerkly.Telefono = '$telefono_NoR' AND presupuesto_noregistrado.trabajoTerminado = '0'";

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