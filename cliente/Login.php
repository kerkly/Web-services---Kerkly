<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Correo=$_POST['Correo'];
    $Nombre=$_POST['Nombre'];
    $Apellido_Paterno=$_POST['Apellido_Paterno'];
    $Apellido_Materno=$_POST['Apellido_Materno'];
    $telefonoCliente=$_POST['telefonoCliente'];
    $generoCliente=$_POST['generoCliente'];
    $Contrasena=$_POST['Contrasena'];
    $fue_NoRegistrado=$_POST['fue_NoRegistrado'];
    $deviceID = $_POST['deviceID'];
   

    require_once('conexionK.php');
    $sqlC = "SELECT * FROM cliente WHERE Correo ='$Correo'";
    $checkCorreo = mysqli_fetch_array(mysqli_query($Conexion,$sqlC));
   if(!isset($checkCorreo)){
     //echo 'El correo no existe';
    $sqlT = "SELECT * From cliente WHERE telefonoCliente='$telefonoCliente'";
     $check = mysqli_fetch_array(mysqli_query($Conexion,$sqlT));
      if(!isset($check)){
      //  echo 'El Número No esta Registrado';
        $hashC = password_hash($Contrasena, PASSWORD_BCRYPT);
          $sql = "INSERT INTO cliente (Correo,Nombre,Apellido_Paterno,Apellido_Materno,telefonoCliente,generoCliente,Contrasena,
          fue_NoRegistrado, deviceID) VALUES ('$Correo','$Nombre','$Apellido_Paterno','$Apellido_Materno','$telefonoCliente','$generoCliente','$hashC',
          '$fue_NoRegistrado' ,'$deviceID')";
          if(mysqli_query($Conexion,$sql)){
             echo "Registrado";
        }else{
           echo '¡Error!' .$sql.mysqli_error($Conexion);
        }
      }else{
         echo 'El Número ya existe';
      }
   }else{
      echo 'El correo ya existe';
   }
      $Conexion->close();
    }
  
?>