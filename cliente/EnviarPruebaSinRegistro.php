<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
      $TipoServicio = $_POST['nombreO'];
        $Problematica = $_POST['problema'];
       // $fechaPresupuesto =$_POST['fechaPresupuesto'];
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


       
       require_once('conexionK.php');
        //primero se hace la consulta para obtener al kerkly que hace ese oficio
        $sqlConsultaK = "SELECT oficio_kerkly.idoficio_trabajador  from oficios inner JOIN oficio_kerkly on 
        oficios.idOficio = oficio_kerkly.id_oficioK INNER JOIN kerkly on    
        oficio_kerkly.id_kerklyK = kerkly.Curp WHERE oficios.nombreO = '$TipoServicio' LIMIT 1;";

        $ResultadoC =mysqli_query($Conexion,$sqlConsultaK) or die(mysqli_error($Conexion));
        /* if($ResultadoC==1){
            echo 'correcto';
        }else{
            echo 'error sql' . mysqli_error($Conexion);
        }*/
        
         while($fila=mysqli_fetch_array($ResultadoC)){
            $curp = $fila[0];
        }
     
        
        //Mandamos la direecion por gps a la tabla direccion
       $sql = "INSERT INTO direccion (latitud,longitud,Calle,Colonia,No_Interior,No_Exterior,Ciudad,Estado,Pais,Codigo_Postal,Referencia) VALUES ('$latitud','$longitud','$Calle','$Colonia','$No_Interior','$No_Exterior','$Ciudad','$Estado','$Pais','$Codigo_Postal','$Referencia')";
       $ejecutado = mysqli_query($Conexion, $sql);
       
        //verificamos si la consulta se ejecuto Corectamente
       if($ejecutado == 1){
            //obtenemos el id del registro que acabamos de insertar en la tabla direccion
            $idDireccion = mysqli_insert_id($Conexion); 
            //primeramente si el numero ya existe ya no se va volver a repetir por lo tanto primero hay que buscarlo
            $verificarNum = "SELECT * FROM clientenoregistrado WHERE telefono_NoR ='$numeroRP'";
            $checkNUM = mysqli_fetch_array(mysqli_query($Conexion,$verificarNum));
            if(isset($checkNUM)){
               
              $ObtenerIdDireccion = "SELECT clientenoregistrado.id_ClieteNoRegistrado from clientenoregistrado where telefono_NoR='$numeroRP'";
                $resultadoDireccion = mysqli_query($Conexion, $ObtenerIdDireccion);
                while($fila=mysqli_fetch_array($resultadoDireccion)){
                    $idObtenida = $fila[0];
                }
               //insertar($Conexion,$curp,$Problematica, $idObtenida);
                echo $idObtenida;
            }else{
                 $sqlDireccion = "INSERT INTO clientenoregistrado (nombre_noR, apellidoP_noR, apellidoM_noR, telefono_NoR,Direccion_idDireccion) VALUES ('$nombre_noR', '$apellidoP_noR', '$apellidoM_noR', '$numeroRP','$idDireccion')";
                $ejecutado2= mysqli_query($Conexion,$sqlDireccion);
                if($ejecutado2 ==1){
                $idClienteNoR = mysqli_insert_id($Conexion);
                //insertar($Conexion,$curp,$Problematica,$idClienteNoR);
                echo $idClienteNoR;
                }
            }
        }
        
        $Conexion->close();
    
   }

    function insertar($Con,$curp, $Problematica,$id){
      //insertamos la curp, problema, fecha de presupuesto a la tabla presupuesto_noregistrado
               $sqlInsertPresupuestoNR = "INSERT INTO presupuesto_noregistrado (idOficio, problema, idNoRTelefono, fechaPresupuesto) VALUES  
               ('$curp','$Problematica','$id', NOW())";
              mysqli_query($Con,$sqlInsertPresupuestoNR);
    }
?>