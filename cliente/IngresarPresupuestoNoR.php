<?php

require_once('conexionK.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Curp =$_POST['Curp'];
    $Problematica = $_POST['problema'];
    $idNoRTelefono  = $_POST['idNoRTelefono'];
    $nombreO  = $_POST['nombreO'];
    

    $consulta = "SELECT oficio_kerkly.idoficio_trabajador from oficios INNER JOIN oficio_kerkly on oficio_kerkly.id_oficioK = oficios.idOficio
     INNER JOIN kerkly on kerkly.Curp = oficio_kerkly.id_kerklyK where oficios.nombreO = '$nombreO' and oficio_kerkly.id_kerklyK = 
     '$Curp'";

    $ResultadoC =mysqli_query($Conexion,$consulta) or die(mysqli_error($Conexion));

    while($fila=mysqli_fetch_array($ResultadoC)){
        $idK = $fila[0];
    }


     $sqlInsertPresupuestoNR = "INSERT INTO presupuesto_noregistrado (idOficio, problema, idNoRTelefono, fechaPresupuesto) VALUES  
     ('$idK','$Problematica','$idNoRTelefono', NOW());";

    $ejecutado = mysqli_query($Conexion,$sqlInsertPresupuestoNR);

    if ($ejecutado == 1) {
        echo 'Presupuesto enviado';
    } else {
        echo 0;
    }

}

?>