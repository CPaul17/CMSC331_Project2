<?php
// File: singleApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the day and advisor options for individual sign-up

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
	font-size:40px;
}
#section {
	border: 10px solid black;
	height: 1000px;
	padding:30px;
	text-align:center;
	font-size: 40px;
}
</style>
</head>
<body>

<!-- page banner -->
<div id="header">
<h1>UMBC Student Advising</h1>
</div>

<div id="section">
<u>Individual Advising</u><br><br>

<form method="post" action="timesSingle.php">

<!-- List of advisors -->
<?php
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$sql = "select `fname`, `lname` from `advisors`";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$row = mysql_fetch_row($rs);

$advisorNames = array();
while($row != NULL){
	$name = array($row[0], $row[1]);
	array_push($advisorNames, $name);
	$row = mysql_fetch_row($rs);
}

if(count($advisorNames) != NULL){
	echo "Advisors: ";
	echo "<select name='adv' style='font-size: 28pt'>";
	foreach($advisorNames as $element){
		echo "<option value=".$element.">".$element[0]." ".$element[1]."</option>";
	}	
	echo "</select><br><br>";
}
else{
	echo "No advisors are available for appointments.<br>";
	echo "Please return to the previous page.<br>";
}

?>

<!-- List of dates available -->
Day:
<select name='singleDay' style="font-size: 28pt">
<option value='2015-03-23'>Monday, March 23</option>
<option value='2015-03-24'>Tuesday, March 24</option>
<option value='2015-03-25'>Wednesday, March 25</option>
<option value='2015-03-26'>Thursday, March 26</option>
<option value='2015-03-27'>Friday, March 27</option>
<option value='2015-03-30'>Monday, March 30</option>
<option value='2015-03-31'>Tuesday, March 31</option>
<option value='2015-04-01'>Wednesday, April 1</option>
<option value='2015-04-02'>Thursday, April 2</option>
<option value='2015-04-03'>Friday, April 3</option>
</select><br><br>

<input type="submit" style="font-size: 28pt" value="See Times"><br>
</form>

<!-- returns to previous page -->
<form action="appOption.php">
<input type="submit" style="font-size: 28pt" value="Previous">
</form>

</div>
</body>
</html>