<?php
require_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $telefonoCliente=$_POST['telefonoCliente'];

        $consultaT = "SELECT * FROM cliente WHERE telefonoCliente='$telefonoCliente'";
        $checkTelefono = mysqli_fetch_array(mysqli_query($Conexion,$consultaT));

        if(isset($checkTelefono)){
            echo 'El número ya existe';
        }else{
            $consultaTele = "SELECT * FROM numtelefonicodelclientenoregistrado WHERE numClienteNoR='$telefonoCliente'";
            $checknumTele = mysqli_fetch_array(mysqli_query($Conexion, $consultaTele));
            if(isset($checknumTele)){
                echo $telefonoCliente;
            }else{
            $sql = "INSERT INTO numtelefonicodelclientenoregistrado (NumClienteNoR) VALUES ('$telefonoCliente')";
            if(mysqli_query($Conexion,$sql)){
                 echo $telefonoCliente;
             }else{
                echo '¡Error!' .mysqli_error($Conexion);
                }
            //echo $telefonoCliente;
            }
        }

    $Conexion->close(); 
    
}else{
    echo '¡Error!';
}
?>