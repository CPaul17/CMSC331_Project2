<?php
// File: confirmGroup.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: inserts student's appointment information into Group database

//start session to access variables
session_start();

include ("cssCode.html");
include ("cssCode2.html");
?>
<html>
<head>

</head>
<body>

<!-- page banner -->
  <!-- Page banner -->
  <div id="security-tip">
      <div class="content">
  <P ALIGN="CENTER"><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT>
  <br><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT>
  </P>
  </div>
  </div>


  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

<center>
<div class = "center">

<?php
//Common object to execute mysql queries
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//retrieves user information from session
$id = $_SESSION["idNum"];

$appointmentID = $_POST['appmt'];

$sql = "select `capacity1` from `appointments2` where `num1`=$appointmentID";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$row = mysql_fetch_row($rs);

$newTotal = $row[0] - 1;
$sql = "update `appointments2` set `capacity1`=$newTotal where `num1`=$appointmentID";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$sql = "update `StudentInfo` set `Appointment`=$appointmentID where `ID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
?>

<P ALIGN="CENTER"><FONT SIZE="5"><U><b>You have successfully created an appointment.</b></U></FONT></P>
<P ALIGN="CENTER"><FONT SIZE="5"><U><b>You can return and view/delete your appointment or log-out</b></U></FONT></P><br><br>

<br>
<br>

<form action="appOption.php">
<input type="submit" style="font-size: 22pt; height: 40px" class = "button go large" value="Return"/>
</form>
<br>
<form action="studentLogin.php">
<input type="submit" style="font-size: 22pt; height: 40px" class = "button go large" value="Log-out">
</form>

</div>
</center>
</body>
</html>