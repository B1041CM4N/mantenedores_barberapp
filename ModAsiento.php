<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $asignado = $_POST['asignado'];
 $nombre = $_POST['nombre'];
 $local = $_POST['local'];
 

 //$CheckSQL = "SELECT * FROM asientos WHERE asignado='$asignado'";
 //$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 //if(isset($check)){
 //echo 'No existe el usuario';
 //}
//else{ 
$Sql_Query = "UPDATE asientos SET asignado= NULL WHERE asignado ='$asignado' AND nombre='$nombre' AND local='$local'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'El asiento ha sido liberado';
}
else
{
 echo 'algo salió mal';
 }
}
//}
 mysqli_close($con);
?>