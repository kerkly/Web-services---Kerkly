<?php
  include_once('conexion.php');
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $Telefono = $_GET['Telefono'];
    $oficio = $_GET['oficio'];
    //$Telefono = 7470006065;
    //$oficio



    //obtendremos la curp usando el numero de telefono
    $ConsultaObtenerCurpK = "SELECT kerkly.Curp from kerkly where kerkly.Telefono = '$Telefono'";
    $resultadoCurp = mysqli_query($Conexion,$ConsultaObtenerCurpK);

    if(isset($resultadoCurp)){
       while($fila= mysqli_fetch_array($resultadoCurp)){
           $curpObtenida = $fila[0];
        }


     $consultaPresupuesto = "SELECT
      presupuesto_noregistrado.problema,
      presupuesto_noregistrado.fechaPresupuesto,
      presupuesto_noregistrado.idPresupuestoNoRegistrado,
      clientenoregistrado.telefono_NoR,
      clientenoregistrado.nombre_noR,
      clientenoregistrado.apellidoP_noR,
      clientenoregistrado.apellidoM_noR,
      direccion.Calle,
      direccion.Colonia,
      direccion.No_Exterior,
      direccion.Codigo_Postal,
      direccion.Referencia FROM oficio_kerkly INNER JOIN presupuesto_noregistrado ON oficio_kerkly.idoficio_trabajador = presupuesto_noregistrado.idOficio
  INNER JOIN clientenoregistrado ON presupuesto_noregistrado.idNoRTelefono = clientenoregistrado.id_ClieteNoRegistrado
  INNER JOIN direccion ON presupuesto_noregistrado.idDireccion = direccion.idDireccion
  WHERE oficio_kerkly.id_kerklyK = '$curpObtenida' AND presupuesto_noregistrado.PagoTotal = 0.0";

     $resultado = mysqli_query($Conexion,$consultaPresupuesto);
    
      $arrayDatos = array();
            if(isset($resultado)){
                while($fila2=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $arrayDatos [] = $fila2;
                }
               // echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE); 
                //$Conexion->close();
             }else{
                echo mysqli_error($Conexion);
             }
    }

    //echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
    
   

      $consulta = "SELECT
      presupuesto_noregistrado.idPresupuestoNoRegistrado,
      presupuesto_noregistrado.problema,
      presupuesto_noregistrado.fechaPresupuesto,
      direccion.Calle, direccion.Colonia, direccion.No_Exterior,
      direccion.Codigo_Postal,
      direccion.Referencia, cliente.Correo, cliente.Nombre,
      cliente.Apellido_Paterno, cliente.Apellido_Materno,
      cliente.telefonoCliente FROMoficio_kerkly INNER JOIN oficios ON oficio_kerkly.id_oficioK = oficios.idOficio
   INNER JOIN presupuesto_noregistrado ON presupuesto_noregistrado.idOficio = oficio_kerkly.idoficio_trabajador
   INNER JOIN cliente ON cliente.Correo = presupuesto_noregistrado.idCliente
   INNER JOIN direccion ON direccion.idDireccion = presupuesto_noregistrado.idDireccion
   WHERE oficios.nombreO = '$oficio' AND presupuesto_noregistrado.kerkly_aceptado = 0 AND presupuesto_noregistrado.PagoTotal = 0.0";

   $resultado = mysqli_query($Conexion,$consulta);
    
   $arrayDatos_ = array();
      if(isset($resultado)){
          while($fila2=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
              $arrayDatos_ [] = $fila2;
          }

          $arr = array_merge($arrayDatos, $arrayDatos_);
          echo json_encode($arr, JSON_UNESCAPED_UNICODE);
          $Conexion->close();
       }else{
          echo mysqli_error($Conexion);
       }
      
   }else{
       echo mysqli_error($Conexion);
    }

?>