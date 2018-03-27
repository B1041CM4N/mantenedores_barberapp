<?php
  include 'DatabaseConfig.php';
	$DB_USER=$UserName; 
	$DB_PASS=$Password; 
	$DB_HOST=$ServerName;
	$DB_NAME=$DBName;
  $objConnect = mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
  $objDB = mysql_select_db($DB_NAME);
  $strSQL = "SELECT * FROM barberos WHERE 1 ";
  $objQuery = mysql_query($strSQL);
  $intNumField = mysql_num_fields($objQuery);
  $resultArray = array();
  while($obResult = mysql_fetch_array($objQuery)){
    $arrCol = array();
    for($i=0;$i<$intNumField;$i++){
      $arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
    }
    array_push($resultArray,$arrCol);
  }
  mysql_close($objConnect);
  echo json_encode($resultArray);
?>