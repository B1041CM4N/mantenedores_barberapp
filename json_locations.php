<?php
	include 'DatabaseConfig.php';
  $DB_USER=$UserName; 
  $DB_PASS=$Password; 
  $DB_HOST=$ServerName;
  $DB_NAME=$DBName;
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if (mysqli_connect_errno()) {
		echo "MySQL: " . mysqli_connect_error();
	}
	$query = mysqli_query($con, "SELECT * FROM barberia ORDER BY nombre ASC");
	$json = '{"barberia": [';
	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($query)){
	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';
		$json .= 
		'{
			"id":"'.str_replace($char,'`',strip_tags($row['id'])).'", 
			"nombre":"'.str_replace($char,'`',strip_tags($row['nombre'])).'",
			"lat":"'.str_replace($char,'`',strip_tags($row['lat'])).'",
			"lng":"'.str_replace($char,'`',strip_tags($row['lng'])).'"
		},';
	}
	// buat menghilangkan koma diakhir array
	$json = substr($json,0,strlen($json)-1);
	$json .= ']}';
	// print json
	echo $json;
	mysqli_close($con);
?>