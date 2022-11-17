<?php
//if($_SERVER['REQUEST_METHOD'] == 'GET'){
  //  $Contrasena =$_GET['Contrasena'];
    $hash = password_hash("12345", PASSWORD_BCRYPT);
    echo $hash;
//}
?>