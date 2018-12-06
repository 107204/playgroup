<?php

include 'config.php';
require_once 'inUser.php';

$sql1 = "SELECT cellphone FROM account WHERE userName='".$name."' AND cellphone='".$number."'";
$stmt1 = sqlsrv_query( $conn, $sql1 );
$row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_NUMERIC);
$cellphone=$row1[0];


if($pos=='1'){
  $total=$_POST['total'];

  for($x=0; $x < $total; $x++){
    $kidName=$_POST['kidName'.$x];
    $kidBirth=$_POST['kidBirth'.$x];
    $kidGen=$_POST['kidGen'.$x];

    $sql2 = "INSERT INTO kid(kidName, kidBirth, kidGen, cellphone) 
             VALUES('$kidName', '$kidBirth', '$kidGen', '$cellphone');";
    $params2 = array(1, "some data");
    $stmt2 = sqlsrv_query( $conn, $sql2, $params2);
  }

}elseif($pos=='2'){
  $teaDesc=$_POST['teaDesc'];

  $sql2 = "INSERT INTO teacher(teaName, teaDesc, cellphone) 
           VALUES('$name', '$teaDesc', '$cellphone');";
  $params2 = array(1, "some data");
  $stmt2 = sqlsrv_query( $conn, $sql2, $params2);

}elseif($pos=='3'){
  $total=$_POST['total'];
  $teaDesc=$_POST['teaDesc'];
  
  for($x=0; $x < $total; $x++){
    $kidName=$_POST['kidName'.$x];
    $kidBirth=$_POST['kidBirth'.$x];
    $kidGen=$_POST['kidGen'.$x];

    $sql2 = "INSERT INTO kid(kidName, kidBirth, kidGen, cellphone) 
             VALUES('$kidName', '$kidBirth', '$kidGen', '$cellphone');";
    $params2 = array(1, "some data");
    $stmt2 = sqlsrv_query( $conn, $sql2, $params2);
  }

  $sql3 = "INSERT INTO teacher(teaName, teaDesc, cellphone) 
           VALUES('$name', '$teaDesc', '$cellphone');";
  $params3 = array(1, "some data");
  $stmt3 = sqlsrv_query( $conn, $sql3, $params3);

}

header('Location: index.php');
exit;

?>