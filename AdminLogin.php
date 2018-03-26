<?php
  include 'DatabaseConfig.php';
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $con = new mysqli($ServerName,$UserName,$Password,$DBName);
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $sql_query = "select * from admin where nombre = '$nombre' and password = '$password' ";
    $check = mysqli_fetch_array(mysqli_query($con,$sql_query));
    if(isset($check)) {
      echo "Comprobado";
    } else {
      echo "Usuario y/o contraseña inválidos, inténtelo de nuevo";
    }
  } else {
    echo "Revise de nuevo";
  }
  mysqli_close($con);
?>