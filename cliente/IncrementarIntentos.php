<?php
include_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $telefono_NoR=$_POST['telefono_NoR'];
    $numIntentos=$_POST['numIntentos'];

        $modificarC = "UPDATE clientenoregistrado SET clientenoregistrado.numIntentos = $numIntentos WHERE  clientenoregistrado.telefono_NoR =$telefono_NoR";
         if(mysqli_query($Conexion,$modificarC)){
             echo 'Exitoso';
            }else{
                 echo 'error de registro' .$Correo." ".$Contrasena;    
            }
    $Conexion->close(); 
}else{
    echo 'Error';
}
?>