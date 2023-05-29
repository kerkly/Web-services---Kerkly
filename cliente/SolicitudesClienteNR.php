<?php
include 'conexionK.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono_NoR=$_GET['telefono_NoR'];

   /* $Consulta = "SELECT presupuesto_noregistrado.idPresupuestoNoRegistrado, presupuesto_noregistrado.fechaPresupuesto, 
    kerkly.Nombre, kerkly.Apellido_Paterno, kerkly.Apellido_Materno, kerkly.Telefono, direccion.Calle, direccion.Colonia, 
    direccion.No_Exterior,direccion.Referencia,direccion.Codigo_Postal, presupuesto_noregistrado.problema, presupuesto_noregistrado.PagoTotal,
     presupuesto_noregistrado.cuerpo_mensaje, 
    presupuesto_noregistrado.estaPagado, clientenoregistrado.nombre_noR, clientenoregistrado.apellidoP_noR, clientenoregistrado.apellidoM_noR, 
    oficios.nombreO from oficios INNER JOIN oficio_kerkly on oficios.idOficio = oficio_kerkly.id_oficioK INNER JOIN kerkly on 
    kerkly.Curp=oficio_kerkly.id_kerklyK INNER JOIN presupuesto_noregistrado on presupuesto_noregistrado.idOficio = 
    oficio_kerkly.idoficio_trabajador INNER JOIN clientenoregistrado on 
    presupuesto_noregistrado.idNoRTelefono = clientenoregistrado.id_ClieteNoRegistrado INNER JOIN 
    direccion on clientenoregistrado.Direccion_idDireccion = direccion.idDireccion INNER JOIN numtelefonicodelclientenoregistrado on 
    clientenoregistrado.telefono_NoR = numtelefonicodelclientenoregistrado.NumClienteNoR where 
    numtelefonicodelclientenoregistrado.NumClienteNoR = '$telefono_NoR' AND presupuesto_noregistrado.PagoTotal>0";*/

    $Consulta = "SELECT
    presupuesto_noregistrado.idPresupuestoNoRegistrado,
    presupuesto_noregistrado.fechaPresupuesto,
    presupuesto_noregistrado.problema,
    presupuesto_noregistrado.PagoTotal,
    kerkly.Telefono,
    oficios.nombreO,
    clientenoregistrado.nombre_noR,
    clientenoregistrado.apellidoP_noR,
    clientenoregistrado.apellidoM_noR
FROM
    presupuesto_noregistrado
INNER JOIN oficios ON oficios.idOficio = presupuesto_noregistrado.idOficio
INNER JOIN clientenoregistrado ON clientenoregistrado.telefono_NoR = presupuesto_noregistrado.idNoRTelefono
INNER JOIN kerkly ON kerkly.Curp = presupuesto_noregistrado.idKerklyQueACepto
WHERE
    presupuesto_noregistrado.idNoRTelefono = '$telefono_NoR'";

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