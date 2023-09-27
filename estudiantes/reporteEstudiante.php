<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreOficio = $_POST['nombreOficio'];
    $palabrasClaves = $_POST['palabrasClaves'];
    $idEstudiantes = $_POST['idEstudiantes'];
    $idTecnicos = $_POST['idTecnicos'];
    $nombreCompleto = $_POST['nombreCompleto'];


    require_once('conexionEstudiantes.php');
    $existeTecnico = "SELECT * FROM tecnicos_profesionistaentrevistados WHERE idTecnicos = '$idTecnicos'";
    $checkTelefono = mysqli_fetch_array(mysqli_query($Conexion, $existeTecnico));
    if (!isset($checkTelefono)) {
        $tecnico = "INSERT INTO tecnicos_profesionistaentrevistados(
            idTecnicos,
            nombreCompleto)
            VALUES(
    '$idTecnicos',
    '$nombreCompleto')";
        if (mysqli_query($Conexion, $tecnico)) {
            $sql = "INSERT INTO reporteestudiantes (nombreOficio,palabrasClaves,idEstudiantes,idTecnicos) 
            VALUES ('$nombreOficio','$palabrasClaves','$idEstudiantes','$idTecnicos')";

            if (mysqli_query($Conexion, $sql)) {
                echo "Registrado";
            } else {
                echo '¡Error!' . $sql . mysqli_error($Conexion);
            }
        }
    } else {
        $sql = "INSERT INTO reporteestudiantes (nombreOficio,palabrasClaves,idEstudiantes,idTecnicos) 
        VALUES ('$nombreOficio','$palabrasClaves','$idEstudiantes','$idTecnicos')";

        if (mysqli_query($Conexion, $sql)) {
            echo "Registrado";
        } else {
            echo '¡Error!' . $sql . mysqli_error($Conexion);
        }
    }






    $Conexion->close();
}

?>.