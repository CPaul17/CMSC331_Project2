<?php

session_start();
?>
<html>
<head>
</head>
<body>

<form method="post" action="timesSingle.php">

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
	echo "Sorry, no single days are available at this time.<br>";
	echo "Please return to the previous page.";
}
else{
	echo "<form action = 'timesSingle.php' method='post'>";
	echo "Day: ";
	echo "<select style='font-size: 28pt' name='singleDay'>";
	foreach($singleDays as $element){
		echo "<option value=".$element.">".$element."</option>";
	}
	echo "</select><br><br>";
	echo "<input type='hidden' name='adv' value=".$advisorID.">";
	echo "<input type='submit' style='font-size: 28pt' value='See Times'>";
}
?>
</form>

<form action="singleApp.php">
<input type="submit" style="font-size: 28pt" value="Previous"> 
</form>

</form>
<body>
</html>
