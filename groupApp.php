<?php
// File: groupApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Shows options for days available for group advising
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
	height: 700px;
	text-align:center;
	font-size: 40px;
}
</style>
</head>
<body>
<div id="header">
<h1>UMBC Student Advising</h1>
</div>

<div id = "section">
<u>Group Advising</u><br><br>

<form method="post" action="timesGroup.php">

<?php
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$sql = "select `date1` from `appointments2` where `ID`<0 and `capacity1`>0";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$groupDays = array();
while($row != NULL){
	array_push($groupDays, $row[0]);
	$row = mysql_fetch_row($rs);
}
$groupDays = array_unique($groupDays);
if(count($groupDays) == 0){
	echo "Sorry, no group days are available at this time.<br>";
	echo "Please return to the previous page.";
}
else{
	echo "<form action = 'timesGroup.php' method='post'>";
	echo "Day: ";
	echo "<select style='font-size: 28pt' name='groupDay'>";
	foreach($groupDays as $element){
		$newElem = date("l, M d", strtotime($element));
		echo "<option value=".$element.">".$newElem."</option>";
	}
	echo "</select><br><br>";
	echo "<input type='submit' style='font-size: 28pt' value='See Times'>";
	echo "</form>";
}

?>
<form action="appOption.php">
<input type="submit" style="font-size: 28pt" value="Previous">
</form>

</div>
</body>
</html>