<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$idContraNoRegistrado = $_POST['idContraNoRegistrado'];
        $Fecha_Inicio_NoRegistrado = $_POST['Fecha_Inicio_NoRegistrado'];
        $Fecha_Final_NoRegistrado = $_POST['Fecha_Final_NoRegistrado'];
        $presupuesto_NoR = $_POST['presupuesto_NoR'];

        $primerConsulta = ""
        

        $consulta = "INSERT INTO contrato_noregistrado(contrato_noregistrado.Fecha_Inicio, 
        contrato_noregistrado.Fecha_Final, 
        contrato_noregistrado.id_presupuesto) 
        VALUES ($Fecha_Inicio_NoRegistrado, $Fecha_Final_NoRegistrado,$presupuesto_NoR)";
           
           if(mysqli_query($Conexion, $consulta)) {
            echo 1;
        } else {
            echo 2;
        }
    }

?>
