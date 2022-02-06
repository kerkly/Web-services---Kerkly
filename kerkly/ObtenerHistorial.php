<?php

include_once('conexion.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono_NoR=$_GET['Telefono'];

    $Consulta = "SELECT contrato_noregistrado.Fecha_Inicio_NoRegistrado, contrato_noregistrado.Fecha_Final_NoRegistrado, contrato_noregistrado.idContraNoRegistrado,
     clientenoregistrado.nombre_noR, clientenoregistrado.apellidoP_noR, clientenoregistrado.apellidoM_noR, clientenoregistrado.telefono_NoR, 
     presupuesto_noregistrado.problema,presupuesto_noregistrado.idPresupuestoNoRegistrado, direccion.Ciudad, direccion.Estado, direccion.Pais, 
     direccion.Calle, direccion.Colonia, direccion.No_Exterior, direccion.Codigo_Postal, direccion.Referencia from 
     contrato_noregistrado INNER JOIN presupuesto_noregistrado on contrato_noregistrado.presupuesto_noR = 
     presupuesto_noregistrado.idPresupuestoNoRegistrado INNER JOIN oficio_kerkly on presupuesto_noregistrado.idOficio = 
     oficio_kerkly.idoficio_trabajador INNER JOIN kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK INNER JOIN clientenoregistrado on 
     clientenoregistrado.id_ClieteNoRegistrado = presupuesto_noregistrado.idNoRTelefono INNER JOIN direccion on direccion.idDireccion = 
     clientenoregistrado.Direccion_idDireccion WHERE kerkly.Telefono = '$telefono_NoR' and contrato_noregistrado.Fecha_Final_NoRegistrado 
     IS not null";

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