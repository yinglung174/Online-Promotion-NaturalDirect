<?php

include("connect.php");
include("../includes/db_connection.php");
$bg = $_REQUEST["msgbox"];
$txt = $_REQUEST["txt-color"];
session_start();
$No = $_SESSION["No"];
$tableNameU = "colortb";
$queryU = "SELECT * from $tableNameU WHERE userID = '$No' ";
$resultU = mysqli_query($conn, $queryU);
if (!$resultU) {
    die("Database access failed: " . mysqli_error($conn));
}
$rowU = mysqli_num_rows($resultU);
$numOfRecordU = count($rowU);
if ($rowU == 0) {
    $sqlC = "INSERT INTO colortb VALUES('','$No','$bg','$txt') ";
    $result = mysql_query($sqlC) or die(mysql_error());
}
$sql = mysql_query("UPDATE colortb SET colortb.colorbg = '$bg', colortb.colortxt = '$txt' WHERE colortb.userID = '$No' ");

if ($sql) {
    header("Location: home.php");
}
?>