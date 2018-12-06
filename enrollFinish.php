<?php
include 'config.php';
require_once 'inEnroll.php';

$child = $_POST['child'];
$c_num = count($child);

for($i = 0; $i < $c_num; $i++){
	$sql1 = "INSERT INTO enrollKid(orderNo, kidNo) 
        	 VALUES('$orderNo', '$child[$i]');";
	$params1 = array(1, "some data");
	$stmt1 = sqlsrv_query( $conn, $sql1, $params1)
			or die(print_r( sqlsrv_errors(), true));
}

?>