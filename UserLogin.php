<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'DatabaseConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $Sql_Query = "select * from usuarios where email = '$email' and password = '$password' ";
 
 $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
 
 if(isset($check)){
 
 echo "Comprobado";
 }
 else{
 echo "Usuario y/o contraseña inválidos, inténtelo de nuevo";
 }
 
 }else{
 echo "Revise de nuevo";
 }
mysqli_close($con);

?>