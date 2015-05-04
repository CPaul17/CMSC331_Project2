<?php
	$debug=false; session_start();
	include('../CommonMethods.php');
	$COMMON = new Common($debug); 
	
	$capacity = $_POST['capacity'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	if($month < 10 && $year < 10)
	{
		$date = $year."-0".$month."-0".$day;
	}
	else if($month < 10)
	{
		$date = $year."-0".$month."-".$day;
	}
	else if($day < 10)
	{
		$date = $year."-".$month."-0".$day;
	}
	else
	{
		$date = $year."-".$month."-".$day;
	}

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

	if(!((($endTime - $startTime) >= 30) && (($endTime - $startTime) != 55)))
	{
		echo("<P ALIGN=\"CENTER\">");
		echo("<FONT SIZE=\"5\">");
		echo("<mark>");
		echo("** Appointment availability must be at least 30 minutes. **");
		echo("</mark>");
		echo("</FONT>");
		echo("</P>");
		include("groupPage.php");
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
		include("groupPage.php");
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
		include("groupPage.php");
	}
	
else
{
	$blocks = getBlocks($startTime, $endTime);
	$check = 0;
	for($i = 0; $i < $blocks; $i++)
	{
		
		if(checkTime($date, $startTime))
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
			if($capacity == 10)
			{
				addAppointment($startTime, $tempEnd, $date, -1, 10);
			}
			else
			{
				addAppointment($startTime, $tempEnd, $date, -2, 5);
			}
			$startTime = $tempEnd;
			header('Location: successfulGroup.php');
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
		include("groupPage.php");
	}
}

function checkTime($appDate, $appTime)
{
	$exact;
	$overlap = false;

	global $debug; global $COMMON;
	$sql = "select `num1` from appointments2 where `date1` = '$appDate' AND `start1` = '$appTime'";
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

	$sql = "select `start1` from appointments2 where `date1` = '$appDate'";
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

function addAppointment($sTime, $eTime, $date1, $ID, $cap)
{
	global $debug; global $COMMON;
	$sql = "insert into appointments2 (`start1`, `end1`, `ID`, `date1`, `capacity1`) values ('$sTime', '$eTime', '$ID', '$date1', '$cap')";
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