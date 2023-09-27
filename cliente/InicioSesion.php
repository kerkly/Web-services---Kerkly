<?php
include_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
 $telefonoCliente=$_POST['telefonoCliente'];
    $Contrasena=$_POST['Contrasena'];

     $ConsultaTele = "SELECT * From cliente where telefonoCliente= '$telefonoCliente'";
     $checkTele= mysqli_fetch_array(mysqli_query($Conexion, $ConsultaTele));
     if(isset($checkTele)){
        $consultaT = "SELECT cliente.Contrasena From cliente WHERE telefonoCliente='$telefonoCliente'";
         $check = mysqli_query($Conexion,$consultaT);
    if(isset($check)){
        while($fila= mysqli_fetch_array($check)){
            $hash = $fila[0];
        }
       
        if(password_verify($Contrasena,$hash)){
            $consulta = "UPDATE cliente set cerroSesion = 0 WHERE cliente.telefonoCliente = '$telefonoCliente'";
            if(mysqli_query($Conexion, $consulta)) {
               echo 'Bienvenido';
            } 
        }else{
            echo 'Contraseña Incorrecta';
        }
    }
     }else{
         echo 'El numero no se encuentra registrado';
     }
   
    $Conexion->close(); 
    }

?>