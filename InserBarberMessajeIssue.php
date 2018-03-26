<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $barberoId = $_POST['barberoId'];
 $tipo = $_POST['tipo'];
 $descripcion = $_POST['descripcion'];

 $CheckSQL = "SELECT * FROM quejas WHERE tipo=''";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo '';

 }
else{ 
$Sql_Query = "INSERT INTO quejas (barberoId,tipo,descripcion) values ('$barberoId','$tipo','$descripcion')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Mensaje enviado';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>