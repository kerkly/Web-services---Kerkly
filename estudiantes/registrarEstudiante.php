<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idEstudiantes=$_POST['idEstudiantes'];
    $nombre=$_POST['nombre'];
    $apellidoP =$_POST['apellidoP'];
    $apellidoM =$_POST['apellidoM'];
    $matricula=$_POST['matricula'];
   

    require_once('conexionEstudiantes.php');

    $sqlC = "SELECT * FROM estudiantes WHERE idEstudiantes ='$idEstudiantes'";
    $checkCorreo = mysqli_fetch_array(mysqli_query($Conexion,$sqlC));
   if(!isset($checkCorreo)){
     //echo 'El correo no existe';
          $sql = "INSERT INTO estudiantes (idEstudiantes,nombre,apellidoP,apellidoM,matricula) 
          VALUES ('$idEstudiantes','$nombre','$apellidoP','$apellidoM','$matricula')";
          if(mysqli_query($Conexion,$sql)){
             echo "Registrado";
        }else{
           echo '¡Error!' .$sql.mysqli_error($Conexion);
        }
      
   }else{
      echo 'Bienvenid@';
   }
      $Conexion->close();
    }
  
?>.