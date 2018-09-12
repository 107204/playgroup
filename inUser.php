<?php

include 'config.php';

$name = $_POST['userName'];
$number = $_POST['number'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$gen = $_POST['gen'];
$pos = $_POST['pos'];

$en_pwd=md5($pwd);
$posIn=(int)$pos;

$sql = "INSERT INTO account(userName, cellphone, pwd, email, userGen, pos) 
        VALUES('$name', '$number', '$en_pwd', '$email', '$gen', '$posIn');";
$params = array(1, "some data");
$stmt = sqlsrv_query( $conn, $sql, $params);

?>