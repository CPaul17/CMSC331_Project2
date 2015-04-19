<?php
// File: timesGroup.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays all available times for group advising on the given day

session_start();
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
	height: 700px;
}
</style>
</head>
<body>

<!-- page banner -->
<div id = "header">
<h1>UMBC Student Advising</h1>
</div>

<div id = "section">
<u>Select from the available group appointment times for the day.</u><br><br>

<?php
//Common object to execute mysql
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//variable to store date the user wants to schedule on
$date = $_POST['groupDay'];

//stores date in session for future use
$_SESSION['date'] = $date;

//retrieves ID from session
$studentID = $_SESSION['idNum'];

//retrieves all times in group database on the given date
$sql = "select `start1`, `signups1` from `appointments2` where `date1`='$date' and `group_1`=0 
	and `full1`=0";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

//empty array to hold all available slots
$availSlots = array();
while($row != NULL){
	array_push($availSlots, $row);
	mysql_fetch_row($rs);
}

//if available times were found
if(count($availSlots) != NULL){
	//creates form and loops through each time in the array
	echo "<form method='post' action='confirmGroup.php'>";
	echo "<select style='font-size: 28pt' name='time'>";

	//echos each time as an option in a drop down menu
	foreach($availSlots as $element){
		echo "<option value=".$element.">".$element."</option>";
	}
	echo "</select><br><br>";
	echo "<input type='submit' style='font-size: 28pt' value='Sign-Up'>";
	echo "</form>";
}
//if no available times are found
else{
	//prompts user to return to previous page and choose a different day
	echo "All times for this day have been booked.<br>";
	echo "Please return to the previous page and select a new day.<br><br>";	
}
?>

<form action="groupApp.php">
<input type="submit" style="font-size: 28pt" value="Previous">
</form>

</div>
</body>
</html>