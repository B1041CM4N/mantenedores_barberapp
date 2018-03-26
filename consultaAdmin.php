<?php
include('functions.php');
$nombre=$_GET["nombre"];
$password=$_GET["password"];


if($resultset=getSQLResultSet("SELECT * FROM `admin` WHERE nombre='$nombre' AND password='$password'")){
	while ($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
	}
}

?>