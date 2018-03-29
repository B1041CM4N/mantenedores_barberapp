<?php
	include 'DatabaseConfig.php';
  $DB_USER=$UserName; 
  $DB_PASS=$Password; 
  $DB_HOST=$ServerName;
  $DB_NAME=$DBName;
  $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$mysqli->query("SET NAMES 'utf8'");
	$sql="SELECT * FROM barberos";
	$result=$mysqli->query($sql);
	while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
	}
	print(json_encode($output)); 
	$mysqli->close();
?>