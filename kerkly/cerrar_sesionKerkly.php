<?php
    include_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $curp = $_POST['curp'];

         $consulta = "UPDATE kerkly set cierraSesion = 0 WHERE kerkly.Curp = '$curp'";

         if(mysqli_query($Conexion, $consulta)) {
             echo 1;
         } else {
             echo 2;
         }
     }

?>