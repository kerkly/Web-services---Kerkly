<?php

    require_once('conexionK.php');

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idPresupuestoNoRegistrado = $_POST['idPresupuestoNoRegistrado'];

        $consulta = "UPDATE presupuesto_noregistrado SET cuerpo_mensaje = '!Gracias por su preferencia! Su servicio técnico llegará en breve.', 
        estaPagado = 1 WHERE presupuesto_noregistrado.idPresupuestoNoRegistrado = 
        $idPresupuestoNoRegistrado;";

        if(mysqli_query($Conexion, $consulta)) {
            echo 1;
        } else {
            echo 2;
        }

    }

?>