<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $asignado = $_POST['asignado'];
 $nombre = $_POST['nombre'];
 $local = $_POST['local'];
 
 

 //$CheckSQL = "SELECT * FROM asientos WHERE asignado=''";
 $CheckSQL = "SELECT * FROM asientos WHERE asignado='$asignado'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Este usuario ya tiene reserva';

 }
else{ 
$Sql_Query = "UPDATE asientos SET asignado='$asignado' WHERE nombre='$nombre' AND local='$local'";
$Sql_Query2 = "UPDATE horas SET asiento='$nombre' WHERE idCliente='$asignado'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'El asiento ha sido asignado';
}
else
{
 echo 'algo salió mal';
 }
}
}
 mysqli_close($con);
?>