<?php
// File: singleApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the day and advisor options for individual sign-up

session_start(); 

include ("cssCode.html");
include ("cssCode2.html");

?>

<html>
<head>
<!-- Format background and border for page -->

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

<div class ="centerGroup">
<P ALIGN="CENTER"><FONT SIZE="4"><U><big><b>Individual Advising</b></big></U></FONT></P>	
<br>
<br>
<form method="post" action="selectSingleDay.php">

<!-- List of advisors -->
<?php
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$sql = "select `fname`, `lname`, `ID` from `advisors`";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

$row = mysql_fetch_row($rs);

$advisorNames = array();
while($row != NULL){
	$name = array($row[0], $row[1], $row[2]);
	array_push($advisorNames, $name);
	$row = mysql_fetch_row($rs);
}

if(count($advisorNames) != NULL){
	echo("<center>");
	echo "<big><big><big><big> Advisors: </big></big></big></big>";
	echo "<select name='adv' style='font-size: 24pt'>";
	foreach($advisorNames as $element){
		echo "<option value=".$element[2].">".$element[0]." ".$element[1]."</option>";
	}	
	echo "</select><br><br>";
		echo("</center>");
		echo("<br>");
		echo("<br>");
		echo("<br>");
}
else{
	echo("<big><big><big><big><u><b>");	
	echo "No advisors are available for appointments.<br>";
	echo "Please return to the previous page.<br>";
	echo("</big></big></big></big></u></b>");	
}

?>
<center>
<input type="submit" class="button go large" style="font-size: 22pt; height: 40px;" value="See Days"><br>
</form>

<br>
<br>

<!-- returns to previous page -->
<form action="appOption.php">
<input type="submit" class="button go large" style="font-size: 22pt; height: 40px;" value="Previous">
</center>
</form>

</div>
</body>
</html>