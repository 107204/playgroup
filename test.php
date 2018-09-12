<?php
 require 'config.php';
  $sql1 = "SELECT courseDate, startTime, endTime, enLimit, enSum FROM courseTime WHERE courseNo = '1'";
  $stmt1 = sqlsrv_query( $conn, $sql1 );
  while( $row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_NUMERIC) ) {
   echo $row1[0].' '.$row1[1];
  }
?>