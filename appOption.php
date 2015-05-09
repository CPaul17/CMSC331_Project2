<?php 
// File: appOption.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the options for appointment types the student can pick
//

//
//start session to save variables
session_start(); 

include ("cssCode.html");
include ("cssCode2.html");
?>
<html>
<head>
<!-- Format for page color and border -->
<style>

</style>
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



<?php

//create Common class to execute mysql queries
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//retrieves student's ID from the session
$id = $_SESSION['idNum'];

//checks if the student already has an appointmetn
$sql = "select * from `StudentInfo` where `ID` = '$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$appointment = $row[4];
?>

<!-- Displays individual and group advising options -->
<?php if($appointment == NULL) : ?>


<div class="centerInd">


<center>
<br>
<!-- Select this option for single appointments.<br><br> -->
<P ALIGN="CENTER"><FONT SIZE="4"><U><big><b>Select this option for single appointments.</b></big></U></FONT></P>
<br>
<br>
<form method="post" action="singleApp.php">
<input type="submit" style="font-size: 28pt; height: 45px" class="button go large" value="Single">
</form>
</center><br>


<br>
<br>
<br>
<br>
<br>


<center>
<!-- Select this option for group adivising with up to 10 students.<br><br> -->
<P ALIGN="CENTER"><FONT SIZE="4"><U><big><b>Select this option for group adivising with up to 10 students.</b></big></U></FONT></P>
<br>
<br>
<form method="post" action="groupApp.php">
<input type="submit" style="font-size: 28pt; height: 45px" class="button go large" value="Group">
</form>
</center>

<br>
<br>
<br>


</div>


<br>
<br>
<br>
<br>
<br>

<form action="studentLogin.php">
<center><input type="submit" style="font-size: 25pt; height: 50px" class="button go large" value="Log-out"></center>
</form>

<!-- Displays delete option if an appointment is already scheduled -->
<?php else : ?>
<u>Appointment Details</u><br><br>
<?php

//retrieves appointment type from database
$sql = "select `Appointment` from `StudentInfo` where `ID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);
$appointment = $row[0];

//retrieves appointment date from database
$sql = "select `Date` from `$appointment` where `StudentID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

//formats mysql date into a more readable version
$date = $row[0];
$formatDate = date("M d, Y", strtotime($date));

//retrieves appointment time from database
$sql = "select `Time` from `$appointment` where `StudentID`='$id'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);
$time = $row[0];
//convert military time to standard for display
$formatTime = date('h:i A', strtotime($time));

?>

<center>
Advisor: <?php echo $appointment."<br>"; ?>
   Date: <?php echo $formatDate."<br>"; ?>
   Time: <?php echo $formatTime."<br>"; ?>
</center><br>

You can only have one appointment. To get sign-up for a different option, 
please delete your existing appointment<br><br>

<!-- Log-out of scheduler -->
<form action="studentLogin.php">
<center><input type="submit" style="font-size: 28pt" value="Log-out"></center>
</form>

<br>


<!-- students must delete existing appointments to create a new one -->
<form method="post" action="deleteApp.php">
<input type="hidden" value="<?php echo $appointment; ?>" name="appointment">
<input type = "submit" style="font-size: 28pt" value="Delete Appointment" name="update">
</form>



<?php endif; ?>

</div>
</body>
</html>