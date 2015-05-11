<?php

session_start();


include ("cssCode.html");
include ("cssCode2.html");

?>
<html>
<head>
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

<form method="post" action="timesSingle.php">

<center>
<div class ="centerGroup">
	<br>

<?php



$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$advisorID = $_POST['adv'];

$sql = "select `date1` from `appointments2` where `ID`!=-1 and `capacity1`>0 and `ID`='$advisorID'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$singleDays = array();
while($row != NULL){
	array_push($singleDays, $row[0]);
	$row = mysql_fetch_row($rs);
}
$singleDays = array_unique($singleDays);
if(count($singleDays) == 0){

	echo("<big><big><big><big><u><b>");
	echo "Sorry, no single days are available at this time.<br>";
	echo "Please return to the previous page.";
	echo("</u></b></big></big></big></big>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");

}
else{
	echo "<form action = 'timesSingle.php' method='post'>";
	echo "<big><big><big><big> Day: </big></big></big></big>";
	echo "<select style='font-size: 24pt' name='singleDay'>";
	foreach($singleDays as $element){
		$newElem = date("l, M d", strtotime($element));
		echo "<option value=".$element.">".$newElem."</option>";
	}

	echo "</select><br><br>";
	echo("<br>");
	echo("<br>");
	echo("<br>");

    echo "<input type='hidden' name='adv' value=".$advisorID.">";
	echo "<input type='submit' style='font-size: 25pt; height: 40px;' class = 'button go large' value='See Times'>";
}
?>
</form>

<br>
<br>

<form action="singleApp.php">
<input type="submit" class = "button go large" style="font-size: 25pt; height: 40px;" value="Previous"> 
</form>

</form>
</center>
</div>
<body>
</html>
