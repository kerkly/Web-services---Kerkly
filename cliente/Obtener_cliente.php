<?php
    include 'conexionK.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $telefono = $_GET['telefonoCliente'];

        $consulta = "SELECT cliente.Correo, cliente.Nombre, cliente.Apellido_Paterno, cliente.Apellido_Materno from cliente where 
        cliente.telefonoCliente = '$telefono';";
        
        $check = mysqli_query($Conexion,$consulta);

        $array = array();
        if(isset($check)){
            while($fila = mysqli_fetch_array($check, MYSQLI_ASSOC)){
                $array[] = $fila;
            }
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
            $Conexion->close();
        }else{
            echo 'Error';
        }
    }


?>