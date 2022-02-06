<?php

include_once('conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
    $telefono_NoR=$_GET['Telefono'];

    $Consulta = "SELECT contrato.Fecha_Inicio, contrato.Fecha_Final, contrato.idContrato,
    cliente.Nombre, cliente.Apellido_Paterno, cliente.Apellido_Materno, cliente.telefonoCliente, 
    presupuesto.problema, presupuesto.idPresupuesto, direccion.Ciudad, direccion.Estado, direccion.Pais, 
    direccion.Calle, direccion.Colonia, direccion.No_Exterior, direccion.Codigo_Postal, direccion.Referencia from 
    contrato INNER JOIN presupuesto on contrato.id_presupuesto = 
    presupuesto.idPresupuesto INNER JOIN oficio_kerkly on presupuesto.idOficio = 
    oficio_kerkly.idoficio_trabajador INNER JOIN kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK INNER JOIN cliente on 
    cliente.Correo = presupuesto.idCliente INNER JOIN direccion on direccion.idDireccion = 
    cliente.Direccion_idDireccion WHERE kerkly.Telefono = '2121212121' and contrato.Fecha_Final 
    IS not null;";

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