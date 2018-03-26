<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $nombre = $_POST['nombre'];
 $password = $_POST['password'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $comuna = $_POST['comuna'];

 $CheckSQL = "SELECT * FROM usuarios WHERE email='$email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'El email ya ha sido usado';

 }
else{ 
$Sql_Query = "INSERT INTO usuarios (nombre,password,email,telefono,comuna) values ('$nombre','$password','$email','$telefono','$comuna')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Registro como usuario común exitoso';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>