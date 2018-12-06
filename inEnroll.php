<?php 
include 'config.php';

$cNo = $_POST['cNo'];
$cellphone = $_POST['cellphone'];
$orderNo = $_POST['MerchantTradeNo'];
$total = $_POST['TotalAmount'];
$note = $_POST['TradeDesc'];
$time = $_POST['time'];
$note = $_POST['TradeDesc'];

	
$sql = "INSERT INTO enroll(orderNo, timeNo, cellphone, courseNo, amount, note) 
        VALUES('$orderNo', '$time', '$cellphone', '$cNo', '$total', '$note');";
$params = array(1, "some data");
$stmt = sqlsrv_query( $conn, $sql, $params)
or die(print_r( sqlsrv_errors(), true));


?>