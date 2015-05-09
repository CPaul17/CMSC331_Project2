<?php
// File: singleApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays the day and advisor options for individual sign-up

//
session_start(); 

include ("cssCode.html");
include ("cssCode2.html");
?>
<html>
<head>
<!-- Format background and border for page -->
<style>
/*#header {
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
*/
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

<div class="centerGroup">
<P ALIGN="CENTER"><FONT SIZE="4"><U><big><b>Individual Advising</b></big></U></FONT></P>	
<!-- <center><u>Individual Advising</u></center> -->
	<br>
	<br>

<form method="post" action="timesSingle.php">

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
	echo("<center><FONT SIZE=\"4\"><big><b> Advisors: </b></big></FONT>");
	echo "<select name='adv' style='font-size: 23pt'>";
	foreach($advisorNames as $element){
		echo "<option value=".$element[2].">".$element[0]." ".$element[1]."</option>";
	}	
	echo "</select></center><br><br>";
}
else{
	echo "No advisors are available for appointments.<br>";
	echo "Please return to the previous page.<br>";
}

//echo("<FONT SIZE=\"6\"><big><b> Day: </b></big></FONT>");

?>

<br>

<!-- List of dates available -->
<!-- Day: -->
<center><FONT SIZE="4"><big><b> Day: </b></big></FONT>

<select name='singleDay' style="font-size: 23pt">
<option value='2015-01-01'>Thursday, January 1</option>
<option value='2015-03-24'>Tuesday, March 24</option>
<option value='2015-03-25'>Wednesday, March 25</option>
<option value='2015-03-26'>Thursday, March 26</option>
<option value='2015-03-27'>Friday, March 27</option>
<option value='2015-03-30'>Monday, March 30</option>
<option value='2015-03-31'>Tuesday, March 31</option>
<option value='2015-04-01'>Wednesday, April 1</option>
<option value='2015-04-02'>Thursday, April 2</option>
<option value='2015-04-03'>Friday, April 3</option>
</select>
</center>
<br>
<br>
<br>
<br>


<!-- <input type="submit" style="font-size: 28pt" value="See Times"><br> -->
<center>
<input type="submit" class="button go large" style="font-size: 15pt" value="See Times"><br>
</form>

<br>

<!-- returns to previous page -->
<form action="appOption.php">
<input type="submit" class="button go large" style="font-size: 15pt" value="Previous">
</center>
</form>

</div>
</body>
</html>