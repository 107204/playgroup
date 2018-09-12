<?php

include 'config.php';
require_once 'inUser.php';

$sql1 = "SELECT userNo FROM account WHERE userName='".$name."' AND cellphone='".$number."'";
$stmt1 = sqlsrv_query( $conn, $sql1 );
$row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_NUMERIC);
$userNo=$row1[0];


if($pos=='1'){
  $total=$_POST['total'];

  for($x=0; $x < $total; $x++){
    $kidName=$_POST['kidName'.$x];
    $age=$_POST['kidAge'.$x];
    $kidGen=$_POST['kidGen'.$x];
    $kidAge=(float)$age;

    $sql2 = "INSERT INTO kid(kidName, kidAge, kidGen, userNo) 
             VALUES('$kidName', '$kidAge', '$kidGen', '$userNo');";
    $params2 = array(1, "some data");
    $stmt2 = sqlsrv_query( $conn, $sql2, $params2);
  }

}elseif($pos=='2'){
  $teaDesc=$_POST['teaDesc'];

  $sql2 = "INSERT INTO teacher(teaName, teaDesc, userNo) 
           VALUES('$name', '$teaDesc', '$userNo');";
  $params2 = array(1, "some data");
  $stmt2 = sqlsrv_query( $conn, $sql2, $params2);

}elseif($pos=='3'){
  $total=$_POST['total'];
  $teaDesc=$_POST['teaDesc'];
  
  for($x=0; $x < $total; $x++){
    $kidName=$_POST['kidName'.$x];
    $age=$_POST['kidAge'.$x];
    $kidGen=$_POST['kidGen'.$x];
    $kidAge=(float)$age;

    $sql2 = "INSERT INTO kid(kidName, kidAge, kidGen, userNo) 
             VALUES('$kidName', '$kidAge', '$kidGen', '$userNo');";
    $params2 = array(1, "some data");
    $stmt2 = sqlsrv_query( $conn, $sql2, $params2);
  }

  $sql3 = "INSERT INTO teacher(teaName, teaDesc, userNo) 
           VALUES('$name', '$teaDesc', '$userNo');";
  $params3 = array(1, "some data");
  $stmt3 = sqlsrv_query( $conn, $sql3, $params3);

}

header('Location: index.php');
exit;

?>