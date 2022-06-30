<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $fotoPerfil=$_POST['fotoPerfil'];
    $telefonCliente=$_POST['telefonoCliente'];
    $nombre=$_POST['nombre'];

    require_once('conexionK.php');

    $sqlT = "SELECT * FROM cliente Where telefonoCliente='$telefonCliente'";
    $check = mysqli_fetch_array(mysqli_query($Conexion,$sqlT));
    if(isset($check)){
        $path = "clienteImg/$nombre.png";
        $url="http://localhost/Kerkly/cliente/$path";
        $sql = "UPDATE cliente Set fotoPerfil = '$url' where telefonoCliente ='$telefonCliente'";
        if(mysqli_query($Conexion,$sql)){
            file_put_contents($path,base64_decode($fotoPerfil));
            echo 'Registrado';
        }else{
            echo '¡Error!' .$sql.mysqli_error($Conexion);
        }
    }else{
        echo '¡Error!' .$sqlT.mysqli_error($Conexion);
    }
}
?>