<?php

    $server		= "localhost";
	$user		= "root";
	$password	= "";
	$database	= "barberappdb";
	
	$con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "MySQL: " . mysqli_connect_error();
	}

	$query = mysqli_query($con, "SELECT * FROM barberia");
	
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
			"comuna":"'.str_replace($char,'`',strip_tags($row['comuna'])).'",
			"direccion":"'.str_replace($char,'`',strip_tags($row['direccion'])).'",
			"descripcion":"'.str_replace($char,'`',strip_tags($row['descripcion'])).'",
			"manana":"'.str_replace($char,'`',strip_tags($row['manana'])).'",
			"tarde":"'.str_replace($char,'`',strip_tags($row['tarde'])).'"
			
		},';
	}

	// buat menghilangkan koma diakhir array
	$json = substr($json,0,strlen($json)-1);

	$json .= ']}';

	// print json
	echo $json;
	
	mysqli_close($con);

?>