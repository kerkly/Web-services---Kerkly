<?php
    require_once('conexionK.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Curp =$_POST['Curp'];
        $Problematica = $_POST['problema'];
        $telefono  = $_POST['telefonoCliente'];
        $nombreO  = $_POST['nombreO'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];
        $Ciudad = $_POST['Ciudad'];
        $Estado  = $_POST['Estado'];
        $Pais  = $_POST['Pais'];
        $Calle = $_POST['Calle'];
        $Colonia = $_POST['Colonia'];
        $No_Exterior  = $_POST['No_Exterior'];
        $Codigo_Postal = $_POST['Codigo_Postal'];
       // $Referencia = $_POST['Referencia'];


        $sqlInsertDireccion = "INSERT INTO direccion (Ciudad, Estado, Pais, Calle, Colonia, No_Exterior, Codigo_Postal, latitud, longitud) VALUES
            ('$Ciudad', '$Estado', '$Pais', '$Calle', '$Colonia', '$No_Exterior', '$Codigo_Postal', '$latitud','$longitud');";

        $ejecutado = mysqli_query($Conexion, $sqlInsertDireccion);

        if ($ejecutado == 1) {
            $idDireccion = mysqli_insert_id($Conexion);
        }

        $updateCliente = "UPDATE cliente SET Direccion_idDireccion  = '$idDireccion' WHERE telefonoCliente = '$telefono'";

        if (mysqli_query($Conexion, $updateCliente)) {
            $obtenerId = "SELECT Correo FROM cliente WHERE telefonoCliente = '$telefono'";
            $resultado = mysqli_query($Conexion, $obtenerId);

            $curp_ = "";

            while($fila=mysqli_fetch_array($resultado)){
                $curp_ = $fila[0];
            }


            $consultaOficio = "SELECT oficio_kerkly.idoficio_trabajador FROM kerkly INNER JOIN oficio_kerkly on
            kerkly.Curp = oficio_kerkly.id_kerklyK INNER JOIN oficios on oficio_kerkly.id_oficioK =
            oficios.idOficio WHERE oficios.nombreO = '$nombreO' and kerkly.Curp = '$Curp';";

            $resultadoOficio = mysqli_query($Conexion, $consultaOficio);

            $oficio = "";

            while($fila=mysqli_fetch_array($resultadoOficio)){
                $oficio = $fila[0];
            }

            $insertPresupuesto = "INSERT INTO presupuesto (problema, idCliente, IdOficio, fechaP, idDireccion, aceptoCliente, trabajoTerminado) VALUES
                                    ('$Problematica', '$curp_', '$oficio', NOW(), '$idDireccion', '0', '0')";

            $ejecutadoInsert = mysqli_query($Conexion, $insertPresupuesto) or die(mysqli_error($Conexion));

            if ($ejecutadoInsert == 1) {
                echo "Datos enviados";
            } else {
                echo "Error en el sistema";
            }
        }

   }


?>