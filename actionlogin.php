<?php
require 'config.php';

$number = $_POST['number'];
$pwd = $_POST['pwd'];
$refer = $_POST['refer'];
$en_pwd = md5($pwd);
$nolog = base64_encode('nolog');
$cc = (int)$number;


if ($number == '' || $pwd == ''){
    // No login information
    header('Location: login.php?refer='. base64_encode('noinfo'));
}else{
    $sql = "SELECT cellphone, DATEDIFF(SECOND,'1970-01-01',GETUTCDATE()) + no + ROUND(DATEDIFF(SECOND,'1970-01-01',GETUTCDATE())*RAND(), 0) FROM account WHERE cellphone='$number' AND pwd='$pwd'";
    $stmt = sqlsrv_query( $conn, $sql )
            or die(header('Location: login.php?refer='.$nolog));

    if(sqlsrv_has_rows($stmt)){
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
        // Update the user record
        $query = "UPDATE account SET cookie = '$row[1]' WHERE cellphone = $row[0]";
            
        sqlsrv_query( $conn, $query )
            or die('cannot insert');
        
        // Set the cookie and redirect
        // setcookie( string name [, string value [, int expire [, string path
        // [, string domain [, bool secure]]]]])
        // Setting cookie expire date, 6 hours from now
        $cookieexpiry = (time() + 21600);
        setcookie("session_id", $row[1], $cookieexpiry);

        if (empty($refer) || !$refer){
            $refer = 'index.php';
        }

        header('Location: index.php?refer='. base64_encode($row[1]));
    }else{
        // Not authenticated
        header('Location: login.php?refer='.$nolog);
    }
}
?>