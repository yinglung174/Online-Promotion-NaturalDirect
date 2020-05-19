<?php
session_start();
include '../db.php';
include("connect.php");
date_default_timezone_set("Asia/Hong_Kong");
$msg = $_REQUEST["txtarea"];
 if (isset($_SESSION["fb_id"])) {
$No = $_SESSION["fb_id"];
 }elseif (isset($_SESSION["No"])) {
    $No = $_SESSION["No"]; 
 }
$date = date("g:i a");
$ddate = date("d/m/Y");
$send = mysqli_query($conn,"INSERT INTO chattb VALUES('','$No','$msg','$date','$ddate') ");

if($send)
{
	header("Location: home.php");
}

?>