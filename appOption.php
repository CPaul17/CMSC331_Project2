<?php 
// File: appOption.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the options for appointment types the student can pick

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
	width: 60%;
}
</style>
</head>
<body>




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


<div class = "centerInd">

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
</div>

<br>
<br>
<br>

<form action="studentLogin.php">
<center><input type="submit" style="font-size: 28pt; height: 45px" class="button go large" value="Log-out"></center>
</form>

<!-- Displays delete option if an appointment is already scheduled -->
<?php else : ?>

<center>
<div class = "center">  
<big><big><big><big><big><b><u>Appointment Details</u></b></big></big></big></big></big><br><br>


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

	echo "<big><big><big><big> Advisor: ".$row[2]." ".$row[1]."</big></big></big></big><br>";
	echo "<big><big><big><big> Date: ".$newDate."</big></big></big></big><br>";
	echo "<big><big><big><big> Time: ".$time."</big></big></big></big><br>";
	echo "<big><big><big><big> Email: ".$row[3]."</big></big></big></big><br>";
}
else{
	echo "<big><big><big><big>Advisor: Group Advising</big></big></big></big><br>";
	echo "<big><big><big><big>Date: ".$date."</big></big></big></big><br>";
	echo "<big><big><big><big>Time: ".$time."</big></big></big></big><br>";
}

?>
</div>

<br>
<br>

<big><big><big>
You can only have one appointment. To sign-up for a different option, 
please delete your existing appointment.<br><br>
</big></big></big>
<!-- Log-out of scheduler -->
<form action="studentLogin.php">
<input type="submit" style="font-size: 22pt; height: 40px;" class = "button go large" value="Log-out">
</form>

<!-- students must delete existing appointments to create a new one -->
<form method="post" action="deleteApp.php">
<input type="hidden" value="<?php echo htmlspecialchars($apmtID); ?>" name="apmtID">
<br>
<input type = "submit" style="font-size: 22pt; height: 40px;" class = "button go large" value="Delete Appointment" name="update">

</center>
</div>

</form>

<?php endif; ?>


</body>
</html>