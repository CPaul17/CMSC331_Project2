<?php
// File: timesSingle.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Displays all available times for individual advising
//		with the chosen advisor

session_start();
include ("cssCode.html");
include ("cssCode2.html");


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
<!-- Format background and border for page -->

</head>
<body>

<!-- page banner -->
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
<P ALIGN="CENTER"><FONT SIZE="5"><U><b>Select from the available appointment times for the day.</b></U></FONT></P>  
<br>
<br>

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
$sql = "select `start1`, `num1` from `appointments2` where `date1`='$date'
	and `ID`=$adv and `capacity1`>0";
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
	echo "<select style='font-size: 24pt' name='appmt'>";
	//all available times are echoed as a drop-down option
	foreach($availSlots as $element){
		$element[0] = timeFormat($element[0]);
		echo "<option value=".$element[1].">".$element[0]."</option>";
	}	

	echo "</select><br><br>";
  echo("<br>");
  echo("<br>");

	echo "<input type='submit' style='font-size: 24pt; height: 40px' class = 'button go large' value='Sign-Up'>";
	echo "</form>";
  echo("<br>");


}
//if no available times are found
else{
	//prompts user to return to previous page and choose a different day
	echo "No times are available for this day.<br>";
	echo "Please return to the previous page and select a new day or advisor.<br><br>";
}
?>

<form action="singleApp.php">
<input type="submit" style="font-size: 24pt; height: 40px;" class = 'button go large' value="Previous">
</form>

</div>
</center>
</body>
</html>