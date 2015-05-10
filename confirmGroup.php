<?php
// File: confirmGroup.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: inserts student's appointment information into Group database

//start session to access variables
session_start();
?>
<html>
<head>
<style>
#header {
	background-color:yellow;
	border: 10px solid black;
	padding:10px;
	color:black;
	text-align:center;
	font-size: 40px;
}
#section {
	border: 10px solid black;
	padding:30px;
	text-align:center;
	font-size: 40px;
	height: 700px;
}
</style>
</head>
<body>

<div id = "header">
<h1>UMBC Student Advising</h1>
</div>

<div id = "section">

<?php
//Common object to execute mysql queries
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//retrieves user information from session
$id = $_SESSION["idNum"];

$appointmentID = $_POST['appmt'];

$sql = "select `signups1` from `appointments2` where `num1`=$appointmentID";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$row = mysql_fetch_row($rs);
$newTotal = $row[0] + 1;

if($newTotal == 10){
	$sql = "update `appointments2` set `full1`=1, `signups1`=$newTotal 
	where `num1`=$appointmentID";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
}
else{
	$sql = "update `appointments2` set `signups1`=$newTotal where `num1`=$appointmentID";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
}

$sql = "update `StudentInfo` set `Appointment`=$appointmentID where `ID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
?>

You have successfully created an appointment.<br>
You can return and view/delete your appointment or log-out<br><br>
<form action="appOption.php">
<input type="submit" style="font-size: 28pt" value="Return to appointment options."/>
</form>
<form action="studentLogin.php">
<input type="submit" style="font-size: 28pt" value="Log-out">
</form>

</div>
</body>
</html>