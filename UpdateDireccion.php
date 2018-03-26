<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $nombre = $_POST['nombre'];
 $descripcion = $_POST['descripcion'];
 
 

 //$CheckSQL = "SELECT * FROM asientos WHERE asignado=''";
 $CheckSQL = "SELECT * FROM barberia WHERE nombre=''";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'La barbería no existe';

 }
else{ 
$Sql_Query = "UPDATE barberia SET descripcion='$descripcion' WHERE nombre='$nombre'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Se ha actualizado la descripción de su barbería';
}
else
{
 echo 'algo salió mal';
 }
}
}
 mysqli_close($con);
?>