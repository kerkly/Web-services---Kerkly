<?php
include_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $Correo=$_POST['Correo'];
    
        $consultaC = "SELECT * FROM cliente WHERE Correo='$Correo'";
        $checkCorreo = mysqli_fetch_array(mysqli_query($Conexion,$consultaC));

        if(isset($checkCorreo)){
            echo 'correcto';
        }else{
            echo '¡Error! El correo '.$Correo. ' no Existe ';
        }

    $Conexion->close(); 
    }

?>