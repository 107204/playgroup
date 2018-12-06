<?php 
include 'config.php';

$uid = $_POST['uid'];
$cName = $_POST['cName'];
$cDesc = $_POST['cDesc'];
$tName = $_POST['tName'];
$city = $_POST['city'];
$district = $_POST['district'];
$address = $_POST['address'];
$agelower = (int)$_POST['agelower'];
$ageupper = (int)$_POST['ageupper'];
$price = (int)$_POST['price'];
$due = $_POST['due'];

// $filename=$_FILES['image']['name'];
// $tmpname=$_FILES['image']['tmp_name'];
// $filetype=$_FILES['image']['type'];
// $filesize=$_FILES['image']['size'];    
// $file=NULL;
    
// if(isset($_FILES['image']['error'])){    
//   if($_FILES['image']['error']==0){                                    
//     $instr = fopen($tmpname,"rb" );
//     $file = addslashes(fread($instr,filesize($tmpname)));        
//   }
// }


$sql = "SELECT userNo FROM account WHERE cookie='".$uid."'";
$stmt = sqlsrv_query( $conn, $sql );
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
$userNo=$row[0];

$sql1 = "INSERT INTO course(course, userNo, teaName, city, district, address, agelower, ageupper, courseDesc, price, dueDay, 				  coursePic) 
        VALUES('$cName', '$userNo', '$tName', '$city', '$district', '$address', $agelower, $ageupper, '$cDesc', $price, 
               '$due', '$file');";
$params = array(1, "some data");
$stmt1 = sqlsrv_query( $conn, $sql1, $params);
header('Location: index.php');
exit;


?>