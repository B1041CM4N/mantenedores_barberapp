<?php
    include 'DatabaseConfig.php';
    // include_once './DatabaseConfig.php';
    $respuesta = array();
    $respuesta["barberos"] = array();  
    // Conectarse al servidor y seleccionar base de datos.
    $con = mysqli_connect("$HostName", "$HostUser", "$HostPass")or die("No se puede conectar al servidor "); 
    mysqli_select_db($con,"$DatabaseName")or die("cannot select DB");
    $sql="SELECT * FROM barberos";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["nombre"] = $row["nombre"];
        $tmp["idBarberia"] = $row["idBarberia"];
		$tmp["password"] = $row["password"];
		$tmp["email"] = $row["email"];
		$tmp["telefono"] = $row["telefono"];  
        // Push categoría a final json array
        array_push($respuesta["barberos"], $tmp);
    }
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>