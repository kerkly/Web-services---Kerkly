<?php
    require_once('conexionK.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idPresupuesto  = $_POST['idPresupuesto'];
        $aceptoCliente =$_POST['aceptoCliente'];
        //$numIntentos =$_POST['numIntentos'];
       // $telefono_NoR =$_POST['telefono_NoR'];

        $Consulta = "UPDATE presupuesto SET aceptoCliente = '$aceptoCliente' WHERE
                    idPresupuesto ='$idPresupuesto'";

        if(mysqli_query($Conexion,$Consulta)){
            $sql = "INSERT INTO contrato(Fecha_Inicio, id_presupuesto) VALUES (NOW(),
                        '$idPresupuesto')";
            $ejecutado = mysqli_query($Conexion, $sql);
            if($ejecutado==1) {
                echo 'Presupuesto Aceptado';
                $consulta = "UPDATE presupuesto SET cuerpo_mensaje = '!Gracias por su preferencia! Su servicio técnico llegará en breve.',
                estado = 1 WHERE presupuesto.idPresupuesto =
                $idPresupuesto;";

                if(mysqli_query($Conexion, $consulta)) {
                } else {
                    echo "Error en el mensaje";
                }
            }else{
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }
?>