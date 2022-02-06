<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idContraNoRegistrado = $_POST['idContraNoRegistrado'];
        $Fecha_Final_NoRegistrado = $_POST['Fecha_Final_NoRegistrado'];

        $consulta = "UPDATE contrato_noregistrado SET contrato_noregistrado.Fecha_Final_NoRegistrado = '$Fecha_Final_NoRegistrado' WHERE 
        contrato_noregistrado.idContraNoRegistrado = $idContraNoRegistrado;";
           
           if(mysqli_query($Conexion, $consulta)) {
            echo 1;
        } else {
            echo 2;
        }
    }

?>
