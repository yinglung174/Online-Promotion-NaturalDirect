<?php
session_start();
//Include FB config file
require_once 'inc/fbConfig.php';

//Unset user data from session
unset($_SESSION['userData']);

//Destroy session data
$facebook->destroySession();
session_destroy();
//Redirect to homepage
header("Location:../index.php");
?>