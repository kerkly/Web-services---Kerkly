<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$idContraNoRegistrado = $_POST['idContraNoRegistrado'];
        $Fecha_Inicio = $_POST['Fecha_Inicio'];
        $Fecha_Final = $_POST['Fecha_Final'];
        $id_presupuesto = $_POST['id_presupuesto'];
        
        $primerConsulta = "UPDATE
        presupuesto
    SET
        presupuesto.trabajoTerminado = '1'
    WHERE
        presupuesto.idPresupuesto = '$id_presupuesto'";

        $consulta = "INSERT INTO contrato(
            contrato.Fecha_Inicio,
            contrato.Fecha_Final,
            contrato.id_presupuesto
        )
        VALUES ('$Fecha_Inicio', '$Fecha_Final','$id_presupuesto')";
           
           if(mysqli_query($Conexion, $primerConsulta,$consulta)) {
            echo 1;
        } else {
            echo 2;
        }
    }

?>
