<?php
  header( 'Content-Type: text/html;charset=utf-8' );
  function ejecutarSQLCommand($commando){
    include 'DatabaseConfig.php';
    $DB_USER=$UserName; 
    $DB_PASS=$Password; 
    $DB_HOST=$ServerName;
    $DB_NAME=$DBName;
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    if ( $mysqli->multi_query($commando)) {
      if ($resultset = $mysqli->store_result()) {
        while ($row = $resultset->fetch_array(MYSQLI_BOTH)) {
        }
        $resultset->free();
      }
    }
    $mysqli->close();
  }
  function getSQLResultSet($commando){
    include 'DatabaseConfig.php';
    $DB_USER=$UserName; 
    $DB_PASS=$Password; 
    $DB_HOST=$ServerName;
    $DB_NAME=$DBName;
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    if ( $mysqli->multi_query($commando)) {
      return $mysqli->store_result();
    }
    $mysqli->close();
  }
?>