<?php
  if($_SERVER['REQUEST_METHOD']=='POST') {
    include 'DatabaseConfig.php';
    $conn = new mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
    // $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Datos que han llegado, Email: "+$email+" Password: "+$password;
    $Sql_Query = "select * from usuarios where email = '$email' and password = '$password' ";
    $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
    echo "Datos de conexión: "+$check;
    if(isset($check)){
      echo "Comprobado";
    } else {
      echo "Usuario y/o contraseña no válidos, intente nuevamente";
    }
  } else {
    echo "Ha ocurrido un problema, revise los datos ingresados e intente nuevamente.";
  }
  mysqli_close($con);
?>