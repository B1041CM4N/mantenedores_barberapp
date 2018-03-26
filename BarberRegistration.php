<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $nombre = $_POST['nombre'];
 $idBarberia = $_POST['idBarberia'];
 $password = $_POST['password'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];

 $CheckSQL = "SELECT * FROM barberos WHERE email='$email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'El email ya ha sido usado';

 }
else{ 
$Sql_Query = "INSERT INTO barberos (nombre,idBarberia,password,email,telefono) values ('$nombre','$idBarberia','$password','$email','$telefono')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Registro como barbero exitoso';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>