<?php
    require_once('conexionK.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Curp =$_POST['Curp'];
        $Problematica = $_POST['problema'];
        $telefono  = $_POST['telefonoCliente'];
        $nombreO  = $_POST['nombreO'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];

        $sqlInsertDireccion = "INSERT INTO direccion (latitud, longitud) VALUES
            ('$latitud','$longitud','$idNoRTelefono');";

        $ejecutado = mysqli_query($Conexion, $sqlInsertDireccion);

        if ($ejecutado == 1) {
            $idDireccion = mysqli_insert_id($Conexion);
        }

        $updateCliente = "UPDATE cliente SET Direccion_idDireccion  = '$idDireccion' WHERE telefonoCliente = '$telefono'";

        if (mysqli_query($Conexion, $updateCliente)) {
            $obtenerId = "SELECT Correo FROM cliente WHERE telefonoCliente = '$telefono'";
            $resultado = mysqli_query($Conexion, $resultado);

            $curp_ = "";

            while($fila=mysqli_fetch_array($resultado)){
                $curp_ = $fila[0];
            }

            $consultaOficio = "SELECT idoficio_trabajador FROM kerkly INNER JOIN oficio_kerkly on
            kerkly.Curp = oficio_kerkly.id_kerklyK INNER JOIN oficios on oficio_kerkly.id_oficioK =
            oficios.idOficio WHERE oficios.nombreO = '$nombreO' and kerkly.Curp = '$curp_';";

            $resultadoOficio = mysqli_query($Conexion, $resultadoOficio);

            $oficio = "";

            while($fila=mysqli_fetch_array($resultadoOficio)){
                $oficio = $fila[0];
            }

            $insertPresupuesto = "INSERT INTO presupuesto (problema, idCliente, IdOficio, fechaP) VALUES
                                    ('$Problematica', '$obtenerId', '$oficio', NOW());"

            $ejecutadoInsert = mysqli_query($Conexion, $insertPresupuesto);

            if ($ejecutadoInsert == 1) {
                echo "Datos enviados";
            } else {
                echo "Error en el sistema";
            }
        }

    }


<?