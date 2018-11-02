<?php
require 'config.php';

$nolog = base64_encode("nolog");

// Check for a cookie, if none go to login page
if (!isset($_COOKIE['session_id'])){
    header('Location: index.php?refer='. $nolog);
}else{
	// Try to find a match in the database
	$guid = $_COOKIE['session_id'];

	$sql = "SELECT userNo, cookie FROM account WHERE cookie = '$guid'";
	$stmt = sqlsrv_query( $conn, $sql )
		or die(header('Location: index.php?refer='. $nolog));

	if(sqlsrv_has_rows($stmt)){
		$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
		$cook = $row[1];
		header('Location: index.php?refer='. base64_encode($cook));
	}
}
?>