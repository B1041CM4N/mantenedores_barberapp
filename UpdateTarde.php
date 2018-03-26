<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $nombre = $_POST['nombre'];
 $tarde = $_POST['tarde'];
 
 

 //$CheckSQL = "SELECT * FROM asientos WHERE asignado=''";
 $CheckSQL = "SELECT * FROM barberia WHERE nombre=''";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'La barbería no existe';

 }
else{ 
$Sql_Query = "UPDATE barberia SET tarde='$tarde' WHERE nombre='$nombre'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'se actualizó el horario de la tarde';
}
else
{
 echo 'algo salió mal';
 }
}
}
 mysqli_close($con);
?>