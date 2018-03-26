<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $fecha = $_POST['fecha'];
 $hora = $_POST['hora'];
 $solicitud = $_POST['solicitud'];
 $idCliente = $_POST['idCliente'];
 $idBarbero = $_POST['idBarbero'];

 $CheckSQL = "SELECT * FROM horas WHERE fecha = '$fecha' AND hora = '$hora'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Esta hora de atención ya fue solicitada';

 }
else{ 
$Sql_Query = "INSERT INTO horas (fecha,hora,solicitud,idCliente,idBarbero) values ('$fecha','$hora','$solicitud','$idCliente','$idBarbero')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Solicitud realizada con éxito';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>