<?php 
include 'config.php';


$tName = $_POST['tName'];

$cDate = $_POST['cDate'];
$sTime = $_POST['sTime'];
$eTime = $_POST['eTime'];
$cTotal = $_POST['cTotal'];

$filename=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
$filetype=$_FILES['image']['type'];
$filesize=$_FILES['image']['size'];    
$file=NULL;

?>