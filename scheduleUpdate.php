<?php
	$debug=false; session_start();
	include('CommonMethods.php');
	$COMMON = new Common($debug); 
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$date = $month."/".$day;

	$startTime = (($_POST['startHour']*100)+($_POST['startMin']));
	$sTOD = $_POST['stimofday'];

	$endTime = (($_POST['endHour']*100)+($_POST['endMin']));
	$eTOD = $_POST['etimofday'];
	
	$checkTOD = 0;
	if($sTOD == am)
	{
		if(!($startTime >= 900 && $startTime < 1200))
		{
			$checkTOD = 1;
		}
	}
	else
	{
		if(!($startTime >= 100 && $startTime <= 330))
		{
			if(!($startTime >= 1200))
			{
				$checkTOD = 1;
			}
		}
		if($startTime < 1200)
		{
			$startTime = $startTime + 1200;
		}
	}
	
	if($eTOD == am)
	{
		if(!($endTime >= 900 && $endTime < 1200))
		{
			$checkTOD = 1;
		}
	}
	else
	{
		if(!($endTime >= 100 && $endTime <= 400))
		{
			if(!($endTime >= 1200))
			{
				$checkTOD = 1;
			}
		}
		if($endTime < 1200)
		{
			$endTime = $endTime + 1200;
		}
	}
	$checkMonth = 0;
	if($month == 2)
	{
		if($day == 29)
		{
			if(($year % 4) != 0)
			{
				$checkMonth = 1;
			}
		}
		else if($day > 29)
		{
			$checkMonth = 1;
		}
	}
	else if(($month == 4) || ($month == 6) || ($month == 9) || ($month == 11))
	{
		if($day == 31)
		{
			$checkMonth = 1;
		}
	}

	$group1;
	$ID;
	
	if(($_POST['group']) == NULL)
	{
		$group1 = 0;
	}
	else
	{
		$group1 = 1;
	}

	if(!checkAdvisors($firstName, $lastName))
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Advisor name does not match records. **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("schedulingPage.php");
	}
	else if(!((($endTime - $startTime) >= 30) && (($endTime - $startTime) != 55)))
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Appointment availability must be at least 30 minutes. **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("schedulingPage.php");
	}
	else if($checkTOD == 1)
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Appointments must be between 9:00 AM and 4:00 PM. **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("schedulingPage.php");
	}
	else if($checkMonth == 1)
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Error: Invalid day **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("schedulingPage.php");
	}
	
else
{
	$ID = getID($firstName, $lastName);
	$blocks = getBlocks($startTime, $endTime);
	$check = 0;
	for($i = 0; $i < $blocks; $i++)
	{
		
		if(checkTime($ID, $date, $startTime, $year))
		{	
			$tempEnd = $startTime + 30;
			if((($tempEnd + 40) % 100) == 0)
			{
				$tempEnd = $tempEnd + 40;
			}
			if((($tempEnd + 25) % 100) == 0)
			{
				$tempEnd = $tempEnd + 40;
			}
			addAppointment($ID, $startTime, $tempEnd, $date, $year, $group1);
			$startTime = $tempEnd;
			header('Location: successfulEntry.php');
		}
		else
		{
			$check = 1;
		}
	}
	if($check == 1)
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Availability not updated. Overlap with current schedule. **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("schedulingPage.php");
	}
}

function checkAdvisors($first, $last)
{
	global $debug; global $COMMON;
	$sql = "select `ID` from advisors where `fname` = '$first' AND `lname` = '$last'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	if($row['ID'] != NULL)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function getID($first, $last)
{
	global $debug; global $COMMON;
	$sql = "select `ID` from advisors where `fname` = '$first' AND `lname` = '$last'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	return $row['ID'];
}
function checkTime($id, $appDate, $appTime, $appYear)
{
	$exact;
	$overlap = false;

	global $debug; global $COMMON;
	$sql = "select `num1` from appointments2 where `ID` = '$id' AND `date1` = '$appDate' AND `year1` = '$appYear' AND `start1` = '$appTime'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	if($row['num1'] == NULL)
	{
		$exact = false;
	}
	else
	{
		$exact = true;
	}

	$sql = "select `start1` from appointments2 where `ID` = '$id' AND `date1` = '$appDate' AND `year1` = '$appYear'";
	$rs = $COMMON->executeQuery($sql, __FILE__);

	while($row = mysql_fetch_array($rs))
	{
		if((($row['start1'] - $appTime) == 15) || (($row['start1'] - $appTime) == -15) || (($row['start1'] - $appTime) == 55) || (($row['start1'] - $appTime) == -55))
		{
			$overlap = true;
		}
	}
	
	if($exact || $overlap)
	{
		return false;
	}
	else
	{
		return true;
	}
	
}

function addAppointment($id, $sTime, $eTime, $date1, $year1, $group_1)
{
	global $debug; global $COMMON;
	$sql = "insert into appointments2 (`start1`, `end1`, `ID`, `date1`, `year1`, `group_1`) values ('$sTime', '$eTime', '$id', '$date1', '$year1', '$group_1')";
	$rs = $COMMON->executeQuery($sql, __FILE__);
}
function getBlocks($start, $end)
{
	$tempStart = $start;
	$tempEnd = $end;
	
	if((($tempStart + 85) % 100) == 0)
	{
		$tempStart = $tempStart + 10;
	}
	else if((($tempStart + 70) % 100) == 0)
	{
		$tempStart = $tempStart + 20;
	}
	else if((($tempStart + 55) % 100) == 0)
	{
		$tempStart = $tempStart + 30;
	}

	if((($tempEnd + 85) % 100) == 0)
	{
		$tempEnd = $tempEnd + 10;
	}
	else if((($tempEnd + 70) % 100) == 0)
	{
		$tempEnd = $tempEnd + 20;
	}
	else if((($tempEnd + 55) % 100) == 0)
	{
		$tempEnd = $tempEnd + 30;
	}
	
	return (intval(($tempEnd - $tempStart)/50));
}


?>