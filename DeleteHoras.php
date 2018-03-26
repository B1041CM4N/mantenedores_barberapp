<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $asiento = $_POST['asiento'];

 $CheckSQL = "SELECT * FROM horas WHERE idCliente=''";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo '';

 }
else{ 
$Sql_Query = "DELETE FROM horas WHERE asiento ='$asiento'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Se ha actualizado la información, hora terminada';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>