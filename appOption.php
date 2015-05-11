<?php 
// File: appOption.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the options for appointment types the student can pick

//start session to save variables
session_start();

function timeFormat($time1){

  $formatTime;
  //convert number into string just it case it hasn't been
  $time = "$time1";
  $count = 0;
  $i = 0;

  //this while loop counts how many elements are in the array
  while($time[$i] != NULL){
    $count++;
    $i++;
  }

  $size = $count;
  //if it's only 3 in length ex. 900 or 300 etc. 
  if($size == 3){
    $formatTime = $formatTime . "0";
    $formatTime = $formatTime . "$time[0]";
    $formatTime = $formatTime . ":";    
    $formatTime = $formatTime . "$time[1]";
    $formatTime = $formatTime . "$time[2]";

  }

  //if it's 4 digits in length ex. 1500 or 2000 etc. 
  if($size == 4){
    $formatTime = $formatTime . "0";
    $formatTime = $formatTime . "$time[0]";
    $formatTime = $formatTime . ":";    
    $formatTime = $formatTime . "$time[1]";
    $formatTime = $formatTime . "$time[2]";

  }

  //now convert from 24 hour display to a 12 hour display with am and pm
  $formatTime = DATE("g:i a", STRTOTIME("$time"));
  
  //return the formatted time
  return $formatTime;
} 
?>
<html>
<head>
<!-- Format for page color and border -->
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
	height: 1000px;
	padding:30px;
	text-align:center;
	font-size: 40px;
}
#boxed {
	border: 1px solid black;
	width: 600px;
}
</style>
</head>
<body>

<!-- Page banner -->
<div id = "header">
<h1>UMBC Student Advising</h1>
</div>

<div id = "section">

<?php
//create Common class to execute mysql queries
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//retrieves student's ID from the session
$id = $_SESSION['idNum'];

//checks if the student already has an appointment

$sql = "select `Appointment` from `StudentInfo` where `ID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);
$apmtID = $row[0];
?>

<!-- Displays individual and group advising options -->
<?php if($row[0] == NULL) : ?>

<center>
<div id="boxed">
Select this option for single appointments.<br><br>
<form method="post" action="singleApp.php">
<input type="submit" style="font-size: 28pt" value="Single">
</form>
<div>
</center><br>

<center>
<div id="boxed">
Select this option for group adivising with up to 10 students.<br><br>
<form method="post" action="groupApp.php">
<input type="submit" style="font-size: 28pt" value="Group">
</form>
</div>
</center><br>

<form action="studentLogin.php">
<input type="submit" style="font-size: 28pt" value="Log-out">
</form>

<!-- Displays delete option if an appointment is already scheduled -->
<?php else : ?>
<u>Appointment Details</u><br><br>

<center>
<div id="boxed">
<?php
$apmtID = (int)$apmtID;
$sql = "select `ID`, `start1`, `date1` from `appointments2` where `num1`=$apmtID";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$advID = $row[0];
$time = timeFormat($row[1]);
$date = $row[2];
$newDate = date("l, M d", strtotime($date));

if($advID != -1){
	$sql = "select * from `advisors` where `ID`=$advID";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	echo "Advisor: ".$row[2]." ".$row[1]."<br>";
	echo "Date: ".$newDate."<br>";
	echo "Time: ".$time."<br>";
	echo "Email: ".$row[3]."<br>";
}
else{
	echo "Advisor: Group Advising<br>";
	echo "Date: ".$date."<br>";
	echo "Time: ".$time."<br>";
}

?>
</div>
</center><br>

You can only have one appointment. To get sign-up for a different option, 
please delete your existing appointment<br><br>

<!-- Log-out of scheduler -->
<form action="studentLogin.php">
<input type="submit" style="font-size: 28pt" value="Log-out">
</form>

<!-- students must delete existing appointments to create a new one -->
<form method="post" action="deleteApp.php">
<input type="hidden" value="<?php echo htmlspecialchars($apmtID); ?>" name="apmtID">
<input type = "submit" style="font-size: 28pt" value="Delete Appointment" name="update">
</form>

<?php endif; ?>

</div>
</body>
</html>