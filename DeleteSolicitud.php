<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $idCliente = $_POST['idCliente'];

 $CheckSQL = "SELECT * FROM horas WHERE idCliente NOT LIKE '$idCliente'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'No ha solicitado hora de atención o ya la ha cancelado';

 }
else{ 
$Sql_Query = "DELETE FROM horas WHERE idCliente ='$idCliente'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Ha cancelado su solicitud de atención';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>