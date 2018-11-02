<?php
include 'config.php';

$cNo = $_POST['cNo'];
$userNo = $_POST['userNo'];
$refer = $_POST['refer'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];


if(empty($comment)){
	$sql = "INSERT INTO score(userNo, courseNo, score) 
	        VALUES('$rowu[0]', '$cNo', '$rating')";
	$params = array(1, "some data");
	$stmt = sqlsrv_query( $conn, $sql, $params);
}else{
	$sql = "INSERT INTO score(userNo, courseNo, score, comment) 
	        VALUES('$userNo', '$cNo', '$rating', '$comment')";
	$params = array(1, "some data");
	$stmt = sqlsrv_query( $conn, $sql, $params);
}
$refer1 = base64_encode($refer);


header('Location: courseCom.php?refer='.$refer1.'&cNo='.$cNo);
exit;



?>