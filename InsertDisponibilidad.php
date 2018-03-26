<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $barberia = $_POST['barberia'];
 $horasDisponibles = $_POST['horasDisponibles'];

 $CheckSQL = "SELECT * FROM disponibilidad WHERE horasDisponibles='$horasDisponibles'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Ya ha establecido este horario como disponible';

 }
else{ 
$Sql_Query = "INSERT INTO disponibilidad (barberia,horasDisponibles) values ('$barberia','$horasDisponibles')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Su nueva hora disponible ya ha sido insertada';
}
else
{
 echo 'algo salió mal';
 }
 }
}
 mysqli_close($con);
?>