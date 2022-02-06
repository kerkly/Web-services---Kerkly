<?php

include_once('conexion.php');
if($_SERVER['REQUEST_METHOD']=='GET'){

    $Telefono = $_GET['Telefono'];

    $consultaPresupuesto = "SELECT presupuesto.problema, cliente.telefonoCliente, cliente.Nombre, cliente.Apellido_Paterno, 
    cliente.Apellido_Materno, direccion.Calle, direccion.Colonia, direccion.No_Exterior, direccion.Codigo_Postal, direccion.Referencia, 
    presupuesto.fechaP, presupuesto.idPresupuesto from kerkly INNER JOIN oficio_kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK INNER JOIN 
    presupuesto on oficio_kerkly.idoficio_trabajador = presupuesto.idOficio inner JOIN cliente on presupuesto.idCliente = cliente.Correo 
    inner JOIN direccion on cliente.Direccion_idDireccion = direccion.idDireccion WHERE kerkly.Telefono = '$Telefono' and 
    presupuesto.pago_total = 0.0;";

    $resultado = mysqli_query($Conexion,$consultaPresupuesto);
    
    $arrayDatos = array();
    if(isset($resultado)){
        while($fila2=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $arrayDatos [] = $fila2;
        }
        echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE); 
        $Conexion->close();
    }else{
        echo mysqli_error($Conexion);
    }


} 

?>