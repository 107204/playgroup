<?php
require 'config.php' ;

// Check for a cookie, if none go to login page
if (!isset($_COOKIE['session_id'])){
    header('Location: index.php?refer='. urlencode(md5('nologin')));
}else{
	// Try to find a match in the database
	$guid = $_COOKIE['session_id'];

	$sql = "SELECT userNo FROM account WHERE cookie = '$guid'";
	$stmt = sqlsrv_query( $conn, $sql )
		or die(header('Location: index.php?refer='. urlencode(md5('nologin'))));

	if(sqlsrv_has_rows($stmt)){
		header('Location: index.php?refer='. urlencode(md5('login')));
	}
}
?>