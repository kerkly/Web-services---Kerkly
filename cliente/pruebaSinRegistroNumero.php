<?php
require_once('conexionK.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $telefonoCliente=$_POST['telefonoCliente'];
   // $telefonoCliente='7471503417';
   $res = '';

        $consultaT = "SELECT * FROM cliente WHERE telefonoCliente='$telefonoCliente'";
        $checkTelefono = mysqli_fetch_array(mysqli_query($Conexion,$consultaT));

        if(isset($checkTelefono)){
            echo 'El numero ya existe';
        }else{
            $consultaTele = "SELECT
            numtelefonicodelclientenoregistrado.NumClienteNoR
        FROM
            numtelefonicodelclientenoregistrado
        WHERE
            numtelefonicodelclientenoregistrado.NumClienteNoR = '$telefonoCliente'";
            $checknumTele = mysqli_query($Conexion, $consultaTele);
            if(isset($checknumTele)){
                while($fila = mysqli_fetch_array($checknumTele)){
                     $res = $fila[0];
                }

                if ($res == $telefonoCliente){
                    echo $res;
                }else{
                 $insert1 = "INSERT INTO numtelefonicodelclientenoregistrado (numtelefonicodelclientenoregistrado.NumClienteNoR) VALUES ('$telefonoCliente')";
                 $consultaInsert1 = mysqli_query($Conexion,$insert1);
                 if(isset($consultaInsert1)){
                     $insertarClienteNR = "INSERT INTO clientenoregistrado (telefono_NoR) VALUES ('$telefonoCliente')";
                     $consultarInsert2 = mysqli_query($Conexion, $insertarClienteNR);
                     if(isset($consultarInsert2)){
                        echo 'Usuario Agregado';
                     }
                 }
                 

                }
                
            }
            
            
        }

    $Conexion->close(); 
    
}else{
    echo '¡Error!';
}
?>