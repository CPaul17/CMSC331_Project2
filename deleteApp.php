<?php
// File: deleteApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: removes the student's appointment from the table

//start sessio to access variables
session_start();

include ("cssCode.html");
include ("cssCode2.html");

?>

<html>
<head>
<!-- Background and border format for page -->

</head>
<body>

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

<form action="appOption.php">

<?php
//Common object to execute mysql
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//retrieves student ID from session
$id = $_SESSION['idNum'];

//variable to hold the type of appointment the student has
$apmtID = $_POST['apmtID'];

//deletes the appointment from the table specified by the type
$sql = "select `capacity1` from `appointments2` where `num1`=$apmtID";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$updatedCap = $row[0] + 1;

$sql = "update `appointments2` set `capacity1`=$updatedCap where `num1`='$apmtID'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$sql = "update `StudentInfo` set `Appointment`=NULL where `ID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

echo "<big><big><big><b>Your appointment has been successfully deleted.</big></big></big></b><br><br><br>";
echo "<big><big><big><b>You may now return to the selection page and sign up for a new appointment.</big></big></big></b><br><br>";
echo("<br>");
echo("<br>");
echo("<br>");

?>
</form>

<form action="appOption.php">
<input type="submit" style="font-size: 22pt; height: 40px;" class = "button go large" value="Return">
</form>

</div>
</center>
</body>
</html>