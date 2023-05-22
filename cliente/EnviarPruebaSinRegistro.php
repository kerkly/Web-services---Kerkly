<?php
  require_once('conexionK.php');

  if($_SERVER['REQUEST_METHOD']=='POST'){
        $TipoServicio = $_POST['nombreO'];
        $Problematica = $_POST['problema'];
        $latitud=$_POST['latitud'];
        $longitud=$_POST['longitud'];
        $Calle= $_POST['Calle'];
        $Colonia= $_POST['Colonia'];
        $No_Interior=$_POST['No_Interior'];
        $No_Exterior=$_POST['No_Exterior'];
        $Ciudad=$_POST['Ciudad'];
        $Estado=$_POST['Estado'];
        $Pais=$_POST['Pais'];
        $Codigo_Postal=$_POST['Codigo_Postal'];
        $Referencia= $_POST['Referencia'];
        $numeroRP=$_POST['numeroRP'];
        $nombre_noR =$_POST['nombre_noR'];
        $apellidoP_noR=$_POST['apellidoP_noR'];
        $apellidoM_noR=$_POST['apellidoM_noR'];
        $numIntentos=$_POST['numIntentos'];

        //verificando Intentos
     $ConsultaIntent = "SELECT
     clientenoregistrado.numIntentos
 FROM
     clientenoregistrado
 WHERE
     clientenoregistrado.telefono_NoR = '$numeroRP'";

     $checkIntento= mysqli_query($Conexion, $ConsultaIntent);
     $intentos = 0;
     if(isset($checkIntento))

    while($fila=mysqli_fetch_array($checkIntento)){
            $intentos = $fila[0];
    }
   
    if($intentos == 3){
        echo 'Se acabo las pruebas sin registro';
    }else{

       $sql = "INSERT INTO direccion(
        latitud,
        longitud,
        Calle,
        Colonia,
        No_Interior,
        No_Exterior,
        Ciudad,
        Estado,
        Pais,
        Codigo_Postal,
        Referencia
    )
    VALUES(
        '$latitud',
        '$longitud',
        '$Calle',
        '$Colonia',
        '$No_Interior',
        '$No_Exterior',
        '$Ciudad',
        '$Estado',
        '$Pais',
        '$Codigo_Postal',
        '$Referencia'
    )";
     
       $ejecutado = mysqli_query($Conexion, $sql);
       if (isset($ejecutado)) {
        $idDireccion = mysqli_insert_id($Conexion); 
         $sqlInsertPresupuestoNR = "INSERT INTO presupuesto_noregistrado(
            presupuesto_noregistrado.problema,
            presupuesto_noregistrado.idOficio,
            presupuesto_noregistrado.idNoRTelefono,
            presupuesto_noregistrado.fechaPresupuesto,
            presupuesto_noregistrado.PagoTotal,
            presupuesto_noregistrado.aceptoCliente,
            presupuesto_noregistrado.kerkly_aceptado,
            presupuesto_noregistrado.trabajoTerminado,
            presupuesto_noregistrado.idDireccion
        )
        VALUES(
            '$Problematica',
            '$TipoServicio',
            '$numeroRP',
            NOW(), '0', '0', '0', '0', '$idDireccion')";
            $ejecutadoPresupuestoNR = mysqli_query($Conexion, $sqlInsertPresupuestoNR);

            if(isset($ejecutadoPresupuestoNR)){
                 //incremento de los intentos
             $ejecutadointentos = "UPDATE clientenoregistrado SET clientenoregistrado.numIntentos = '$numIntentos' WHERE  clientenoregistrado.telefono_NoR ='$numeroRP'";
            $sqlIntentos = mysqli_query($Conexion, $ejecutadointentos);
            if(isset($sqlIntentos)){
                echo 'Solicitud Enviada';
                $Conexion->close();
            }else{
                echo 'intentos no actualizados';
                 $Conexion->close();
            }
            }else{
                echo 'solicitud no enviada';
            }

       }else{
        echo 'direccion no insertada';
       }

    }
       
}else{
 echo 'error sql' . mysqli_error($Conexion);
}

?>