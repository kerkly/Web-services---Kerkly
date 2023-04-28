<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $Fecha_Final_NoRegistrado = $_POST['Fecha_Final_NoRegistrado'];
        $idPresupuestoNoRegistrado = $_POST['idPresupuestoNoRegistrado'];

        $consulta2 = "INSERT INTO contrato_noregistrado(
            contrato_noregistrado.Fecha_Inicio_NoRegistrado,
            contrato_noregistrado.Fecha_Final_NoRegistrado,
            contrato_noregistrado.idPresupuestoNoRegistrado
        )
        VALUES (NOW(),'$Fecha_Final_NoRegistrado','$idPresupuestoNoRegistrado')";

        $consulta = "UPDATE
        presupuesto_noregistrado
    SET
        presupuesto_noregistrado.trabajoTerminado = '1'
    WHERE
        presupuesto_noregistrado.idPresupuestoNoRegistrado = '$idPresupuestoNoRegistrado'";

           if(mysqli_query($Conexion, $consulta)) {
                echo 1;
        } else {
            echo 'Error al hacer la consulta';
        }
    }

?>
