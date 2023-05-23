<?php
  include_once('conexion.php');
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $Telefono = $_GET['Telefono'];
   // $oficio = $_GET['oficio'];
    

    //obtendremos la curp usando el numero de telefono
    $ConsultaObtenerCurpK = "SELECT kerkly.Curp from kerkly where kerkly.Telefono = '$Telefono'";
    $resultadoCurp = mysqli_query($Conexion,$ConsultaObtenerCurpK);

    if(isset($resultadoCurp)){
       while($fila= mysqli_fetch_array($resultadoCurp)){
           $curpObtenida = $fila[0];
        }


     $consultaPresupuesto = "SELECT
     presupuestourgente.problema,
     presupuestourgente.fechaP,
     presupuestourgente.idPresupuesto,
     cliente.telefonoCliente,
     cliente.Nombre,
     cliente.Correo,
     cliente.Apellido_Paterno,
     cliente.Apellido_Materno,
     direccion.Calle,
     direccion.Colonia,
     direccion.No_Exterior,
     direccion.Codigo_Postal,
     direccion.Referencia,
     direccion.latitud,
     direccion.longitud,
     oficios.nombreO
 FROM
     oficio_kerkly
 INNER JOIN presupuestourgente ON oficio_kerkly.id_oficioK = presupuestourgente.idOficio
 INNER JOIN cliente ON presupuestourgente.idCliente = cliente.Correo
 INNER JOIN oficios ON oficios.idOficio = presupuestourgente.idOficio
 INNER JOIN direccion ON presupuestourgente.idDireccion = direccion.idDireccion
 WHERE
     oficio_kerkly.id_kerklyK = '$curpObtenida' AND presupuestourgente.pago_total = 0.0";

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

   }

?>