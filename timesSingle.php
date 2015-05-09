<?php
// File: timesSingle.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays all available times for individual advising
//		with the chosen advisor

//
session_start();
include ("cssCode.html");
include ("cssCode2.html");
?>
<html>
<head>
<!-- Format background and border for page -->
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
	height: 1000px;
}
</style>
</head>
<body>

<!-- page banner -->
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

<div id = "section">
<u>Select from the available appointment times for the day.</u><br><br>

<?php
//Common object to execute mysql
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//date of the desired appointment
$date = $_POST['singleDay'];
$_SESSION['date'] = $date;

//name of the desired advisor
$adv = $_POST['adv'];
$_SESSION['advisor'] = $adv;

//checks database for all taken appointment times
$sql = "select `start1`, `num1` from `appointments2` where `date1`='$date' and `group_1`=0 
	and `full1`=0 and `ID`=$adv";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

//creates array of the taken times
$row = mysql_fetch_row($rs);
$availSlots = array();
while($row != NULL){
	$idAndTime = array($row[0], $row[1]);
	array_push($availSlots, $idAndTime);
	$row = mysql_fetch_row($rs);
}

//if there are available times
if(count($availSlots) != NULL){
	//echos form and drop down menu
	echo "<form method='post' action='confirmSingle.php'>";
	echo "<select style='font-size: 28pt' name='appmt'>";
	//all available times are echoed as a drop-down option
	foreach($availSlots as $element){
		echo "<option value=".$element[1].">".$element[0]."</option>";
	}	
	echo "</select><br><br>";
	echo "<input type='submit' style='font-size: 28pt' value='Sign-Up'>";
	echo "</form>";
}
//if no available times are found
else{
	//prompts user to return to previous page and choose a different day
	echo "No times are available for this day.<br>";
	echo "Please return to the previous page and select a new day or advisor.<br><br>";
}
?>

<form action="singleApp.php">
<input type="submit" style="font-size: 28pt" value="Previous">
</form>

</div>
</body>
</html>