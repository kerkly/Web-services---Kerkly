<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $Contrasena =$_GET['Contrasena'];
    $hash = password_hash($Contrasena, PASSWORD_BCRYPT);
    echo $hash;
}
?>