<?php
include_once('conexion.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   $Telefono=$_POST['Telefono'];
  $Contrasena=$_POST['Contrasena'];
     
    $consultaT = "SELECT * FROM kerkly WHERE Telefono='$Telefono'";
    $check = mysqli_fetch_array(mysqli_query($Conexion,$consultaT));
    
    if(isset($check)){
       $ConsultaObC = "SELECT kerkly.Contrasena FROM kerkly Where Telefono ='$Telefono'";
        $Result = mysqli_query($Conexion, $ConsultaObC);
        while($fila=mysqli_fetch_array($Result)){
            $hash = $fila[0];
        }
       if(password_verify($Contrasena,$hash)){
             echo '1';
        }else{
             echo 'Error verifique su contraseña o su número de usaurio';
        }
        
    }else{
         echo '0';
    }

    $Conexion->close(); 
 }

?>