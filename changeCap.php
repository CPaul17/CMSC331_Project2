<?php
	$debug=false; session_start();
	include('../CommonMethods.php');
	$COMMON = new Common($debug);
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];

	$allD = $_POST['allDays'];
	$allA = $_POST['allAds'];

	$num = $_POST['num'];
	
	changeCapacity($num);
	
	include("header.html");
	
	echo("<CENTER>");
	echo("<br>");
	echo("<form action='schedulePrinter.php' method='post' name='form1'>");
	echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
	echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
	echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
	echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
	echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
	echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
	echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
	echo("<input type='submit' value=\"Back\" style=\"width:100px;height:60px;background-color:black;color:white;\">");
	echo("</CENTER>");
function changeCapacity($app)
{
	global $debug; global $COMMON;
		
	$sql = "select * from appointments2 where `num1` = '$app'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_array($rs);
	
	if ($row['ID'] == -1)
	{
		if (!($row['capacity1'] < 5))
		{
			$sql = "update `appointments2` set `ID` = -2 where `num1` = '$app'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			
			$capacity = $row['capacity1'] - 5;
			$sql = "update `appointments2` set `capacity1` = '$capacity' where `num1` = '$app'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		}
	}
	else if ($row['ID'] == -2)
	{
		$sql = "update `appointments2` set `ID` = -1 where `num1` = '$app'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			
		$capacity = $row['capacity1'] + 5;
		$sql = "update `appointments2` set `capacity1` = '$capacity' where `num1` = '$app'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	}
}


?>