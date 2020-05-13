<?php
session_start();
include '../includes/db_connection.php';
include("connect.php");
date_default_timezone_set("Asia/Hong_Kong");
$msg = $_REQUEST["txtarea"];
$No = $_SESSION["No"];
$date = date("g:i a");
$ddate = date("d/m/Y");
$_SESSION["user"] = $_POST["username"];
$_SESSION["pw"] = $_POST["password"];
$send = mysql_query("INSERT INTO chattb VALUES('','$No','$msg','$date','$ddate') ");

if($send)
{
	header("Location: home.php");
}

?>