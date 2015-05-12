<?php
// File: groupApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Shows options for days available for group advising


include ("cssCode.html");
include ("cssCode2.html");

?>

<html>
<head>
<!-- Format background and border for page -->
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

<center>
<div class = "center">
<big><big><big><big><b><u>Group Advising</u></b></big></big></big></big><br><br><br>

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
sort($groupDays);
if(count($groupDays) == 0){
	echo "Sorry, no group days are available at this time.<br>";
	echo "Please return to the previous page.";
}
else{
	echo "<form action = 'timesGroup.php' method='post'>";
	echo "<big><big><big><big>Day: </big></big></big></big>";
	echo "<select style='font-size: 24pt' name='groupDay'>";
	foreach($groupDays as $element){
		$newElem = date("l, M d", strtotime($element));
		echo "<option value=".$element.">".$newElem."</option>";
	}

	echo "</select><br><br><br><br><br>";
	echo "<input type='submit' style='font-size: 22pt; height: 40px;' class = 'button go large' value='See Times'>";
	echo "</form>";
	
}

?>

<br>
<br>
<form action="appOption.php">
<input type="submit" style="font-size: 22pt; height: 40px;" class = 'button go large' value="Previous">
</form>

</div>
</center>
</body>
</html>