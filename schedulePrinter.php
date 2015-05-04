<?php
	$debug=false; session_start();
	include('../CommonMethods.php');
	$COMMON = new Common($debug);
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
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

	$allD = $_POST['allDays'];
	$allA = $_POST['allAds'];
	
	if(!($allD == NULL) && !($allA == NULL))
	{
		$sql = "select * from appointments2 order by `date1`, `start1` ASC";

		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

		include("header.html");
		
		include("buttons.html");

		echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
		echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
		echo("<style>table th {color:white;background-color:black;}</style>");
		echo("<style>table th, td {padding:20px;}</style>");
		echo("<CENTER>"); 
		echo("<table border='5px' style=\"border:solid black;border-collapse:collapse;text-align:center;\"");
		echo("<tr>");
		echo("<th>"."<FONT SIZE=5>"."Date"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Advisor"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Appt. Start"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Appt. End  "."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Signups"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Capacity"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Full?"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Delete"."</FONT>"."</th>");
		echo("</tr>");
		echo("<tr>");
		while($row = mysql_fetch_array($rs))
		{	
			$tempDate = $row['date1'];
			echo("<tr>");
			echo("<td>".$tempDate."</td>");
			echo("<td>".getName($row['ID'])."</td>");
			echo("<td>".convertTime($row['start1'])."</td>");
			echo("<td>".convertTime($row['end1'])."</td>");
			
			$signups;
			$capacity;
			if($row['ID'] == -1)
			{
				$signups = 10 - $row['capacity1'];
				$capacity = 10;
			}
			else if ($row['ID'] == -2)
			{
				$signups = 5 - $row['capacity1'];
				$capacity = 5;
			}
			else
			{
				$signups = 1 - $row['capacity1'];
				$capacity = 1;
			}
			echo("<td>".$signups."</td>");
			if ($capacity == 10)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&dArr;\" style=\"background-color:black;color:red;\"></td></form>");
			}
			else if ($capacity == 5)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&uArr;\" style=\"background-color:black;color:green;\"></td></form>");

			}
			else
			{
				echo("<td>".$capacity."</td>");
			}
			if($row['capacity1'] == 0)
			{
				echo("<td>"." Yes "."</td>");
			}
			else
			{
				echo("<td>"." No "."</td>");
			}
			echo("<form action='deleteAppA.php' method='post' name='form2'>");
			echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
			echo("<input type=\"hidden\" name=\"date\" value=\"".$row['date1']."\">");
			echo("<input type=\"hidden\" name=\"time\" value=\"".$row['start1']."\">");
			echo("<td><input type='submit' value=\"Delete\"></td></form>");
			echo("</tr>");	
		}
		echo("</table>");
		echo("</CENTER>");

	}
	else if (!($allD == NULL))
	{
		if(!checkAdvisors($firstName, $lastName))
		{
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor name does not match records. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			include("printingPage.php");
		}
		else
		{
			$ID = getID($firstName, $lastName);
			
			$sql = "select * from appointments2 where `ID` = '$ID' OR `ID` = -1 OR `ID` = -2 order by `date1`, `start1` ASC";

			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

			include("header.html");

			include("buttons.html");

			echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
			echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
			echo("<style>table th {color:white;background-color:black;}</style>");
			echo("<style>table th, td {padding:20px;}</style>");
			echo("<CENTER>"); 
			echo("<table border='5px' style=\"border:solid black;border-collapse:collapse;text-align:center;\"");
			echo("<tr>");
			echo("<th>"."<FONT SIZE=5>"."Date"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Advisor"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. Start"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. End  "."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Signups"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Capacity"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Full?"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Delete"."</FONT>"."</th>");
			echo("</tr>");
			echo("<tr>");
			while($row = mysql_fetch_array($rs))
			{	
				$tempDate = $row['date1'];
				echo("<tr>");
				echo("<td>".$tempDate."</td>");
				echo("<td>".getName($row['ID'])."</td>");
				echo("<td>".convertTime($row['start1'])."</td>");
				echo("<td>".convertTime($row['end1'])."</td>");
				$signups;
				$capacity;
				if($row['ID'] == -1)
				{
					$signups = 10 - $row['capacity1'];
					$capacity = 10;
				}
				else if ($row['ID'] == -2)
				{
					$signups = 5 - $row['capacity1'];
					$capacity = 5;
				}
				else
				{
					$signups = 1 - $row['capacity1'];
					$capacity = 1;
				}
				echo("<td>".$signups."</td>");
				if ($capacity == 10)
				{
					echo("<form action='changeCap.php' method='post' name='form1'>");
					echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
					echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
					echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
					echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
					echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
					echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
					echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
					echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
					echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&dArr;\" style=\"background-color:black;color:red;\"></td></form>");
				}
				else if ($capacity == 5)
				{
					echo("<form action='changeCap.php' method='post' name='form1'>");
					echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
					echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
					echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
					echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
					echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
					echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
					echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
					echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
					echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&uArr;\" style=\"background-color:black;color:green;\"></td></form>");	

				}
				else
				{
					echo("<td>".$capacity."</td>");
				}
				if($row['capacity1'] == 0)
				{
					echo("<td>"." Yes "."</td>");
				}
				else
				{
					echo("<td>"." No "."</td>");
				}
				echo("<form action='deleteAppA.php' method='post' name='form2'>");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<input type=\"hidden\" name=\"date\" value=\"".$row['date1']."\">");
				echo("<input type=\"hidden\" name=\"time\" value=\"".$row['start1']."\">");
				echo("<td><input type='submit' value=\"Delete\"></td></form>");
				echo("</tr>");	
			}
			echo("</table>");
			echo("</CENTER>");
		}	
	}
	else if (!($allA == NULL))
	{
		if(!checkDate_($date))
		{
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** No appointments scheduled on selected date. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			include("printingPage.php");
		}
		else
		{
			$sql = "select * from appointments2 where `date1` = '$date' order by `date1`, `start1` ASC";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			
			include("header.html");

			include("buttons.html");
			
			echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
			echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
			echo("<style>table th {color:white;background-color:black;}</style>");
			echo("<style>table th, td {padding:20px;}</style>");
			echo("<CENTER>"); 
			echo("<table border='5px' style=\"border:solid black;border-collapse:collapse;text-align:center;\"");
			echo("<tr>");
			echo("<th>"."<FONT SIZE=5>"."Date"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Advisor"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. Start"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. End  "."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Signups"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Capacity"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Full?"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Delete"."</FONT>"."</th>");
			echo("</tr>");
			echo("<tr>");
			while($row = mysql_fetch_array($rs))
			{	
				$tempDate = $row['date1'];
				echo("<tr>");
				echo("<td>".$tempDate."</td>");
				echo("<td>".getName($row['ID'])."</td>");
				echo("<td>".convertTime($row['start1'])."</td>");
				echo("<td>".convertTime($row['end1'])."</td>");
				$signups;
			$capacity;
			if($row['ID'] == -1)
			{
				$signups = 10 - $row['capacity1'];
				$capacity = 10;
			}
			else if ($row['ID'] == -2)
			{
				$signups = 5 - $row['capacity1'];
				$capacity = 5;
			}
			else
			{
				$signups = 1 - $row['capacity1'];
				$capacity = 1;
			}
			echo("<td>".$signups."</td>");
			if ($capacity == 10)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&dArr;\" style=\"background-color:black;color:red;\"></td></form>");
			}
			else if ($capacity == 5)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&uArr;\" style=\"background-color:black;color:green;\"></td></form>");

			}
			else
			{
				echo("<td>".$capacity."</td>");
			}
			if($row['capacity1'] == 0)
			{
				echo("<td>"." Yes "."</td>");
			}
			else
			{
				echo("<td>"." No "."</td>");
			}
			echo("<form action='deleteAppA.php' method='post' name='form2'>");
			echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
			echo("<input type=\"hidden\" name=\"date\" value=\"".$row['date1']."\">");
			echo("<input type=\"hidden\" name=\"time\" value=\"".$row['start1']."\">");
			echo("<td><input type='submit' value=\"Delete\"></td></form>");
			echo("</tr>");	
		}
		echo("</table>");
		echo("</CENTER>");

		}
	}
	else
	{
		if(!checkAdvisors($firstName, $lastName))
		{
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor name does not match records. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			include("printingPage.php");
		}
		else if(!checkAdDate($date, getID($firstName, $lastName)))
		{
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** No appointments scheduled for selected advisor on selected date. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			include("printingPage.php");
		}
		else
		{
			$ID = getID($firstName, $lastName);
			
			$sql = "select * from appointments2 where `date1` = '$date' AND (`ID` = '$ID' OR `ID` = -1 OR `ID` = -2) order by `date1`, `start1` ASC";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

			include("header.html");

			include("buttons.html");

			echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
			echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
			echo("<style>table th {color:white;background-color:black;}</style>");
			echo("<style>table th, td {padding:20px;}</style>");
			echo("<CENTER>"); 
			echo("<table border='5px' style=\"border:solid black;border-collapse:collapse;text-align:center;\"");
			echo("<tr>");
			echo("<th>"."<FONT SIZE=5>"."Date"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Advisor"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. Start"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Appt. End  "."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Signups"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Capacity"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Full?"."</FONT>"."</th>");
			echo("<th>"."<FONT SIZE=5>"."Delete"."</FONT>"."</th>");
			echo("</tr>");
			echo("<tr>");
			while($row = mysql_fetch_array($rs))
			{	
				$tempDate = $row['date1']."/".$row['year1'];
				echo("<tr>");
				echo("<td>".$tempDate."</td>");
				echo("<td>".getName($row['ID'])."</td>");
				echo("<td>".convertTime($row['start1'])."</td>");
				echo("<td>".convertTime($row['end1'])."</td>");
				$signups;
			$capacity;
			if($row['ID'] == -1)
			{
				$signups = 10 - $row['capacity1'];
				$capacity = 10;
			}
			else if ($row['ID'] == -2)
			{
				$signups = 5 - $row['capacity1'];
				$capacity = 5;
			}
			else
			{
				$signups = 1 - $row['capacity1'];
				$capacity = 1;
			}
			echo("<td>".$signups."</td>");
			if ($capacity == 10)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&dArr;\" style=\"background-color:black;color:red;\"></td></form>");
			}
			else if ($capacity == 5)
			{
				echo("<form action='changeCap.php' method='post' name='form1'>");
				echo("<input type=\"hidden\" name=\"fname\" value=\"".$firstName."\">");
				echo("<input type=\"hidden\" name=\"lname\" value=\"".$lastName."\">");
				echo("<input type=\"hidden\" name=\"month\" value=\"".$month."\">");
				echo("<input type=\"hidden\" name=\"day\" value=\"".$day."\">");
				echo("<input type=\"hidden\" name=\"year\" value=\"".$year."\">");
				echo("<input type=\"hidden\" name=\"allDays\" value=\"".$allD."\">");
				echo("<input type=\"hidden\" name=\"allAds\" value=\"".$allA."\">");
				echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
				echo("<td>".$capacity."&nbsp;<input type='submit' value=\"&uArr;\" style=\"background-color:black;color:green;\"></td></form>");

			}
			else
			{
				echo("<td>".$capacity."</td>");
			}
			if($row['capacity1'] == 0)
			{
				echo("<td>"." Yes "."</td>");
			}
			else
			{
				echo("<td>"." No "."</td>");
			}
			echo("<form action='deleteAppA.php' method='post' name='form2'>");
			echo("<input type=\"hidden\" name=\"num\" value=\"".$row['num1']."\">");
			echo("<input type=\"hidden\" name=\"date\" value=\"".$row['date1']."\">");
			echo("<input type=\"hidden\" name=\"time\" value=\"".$row['start1']."\">");
			echo("<td><input type='submit' value=\"Delete\"></td></form>");
			echo("</tr>");	
		}
		echo("</table>");
		echo("</CENTER>");

		}	
	}

function convertTime($time)
{
	$time_ = $time;
	$min;
	if($time_ >= 900 && $time_ < 1000)
	{
		$min = $time_ - 900;
		if($min == 0)
		{
			$time_ = "9:00 AM";
		}
		else
		{
			$time_ = "9:".$min." AM";
		}
	}
	else if($time_ >= 1000 && $time_ < 1100)
	{
		$min = $time_ - 1000;
		if($min == 0)
		{
			$time_ = "10:00 AM";
		}
		else
		{
			$time_ = "10:".$min." AM";
		}
	}
	else if($time_ >= 1100 && $time_ < 1200)
	{
		$min = $time_ - 1100;
		if($min == 0)
		{
			$time_ = "11:00 AM";
		}
		else
		{
			$time_ = "11:".$min." AM";
		}
	}
	else if($time_ >= 1200 && $time_ < 1300)
	{
		$min = $time_ - 1200;
		if($min == 0)
		{
			$time_ = "12:00 PM";
		}
		else
		{
			$time_ = "12:".$min." PM";
		}
	}
	else if($time_ >= 1300 && $time_ < 1400)
	{
		$min = $time_ - 1300;
		if($min == 0)
		{
			$time_ = "1:00 PM";
		}
		else
		{
			$time_ = "1:".$min." PM";
		}
	}
	else if($time_ >= 1400 && $time_ < 1500)
	{
		$min = $time_ - 1400;
		if($min == 0)
		{
			$time_ = "2:00 PM";
		}
		else
		{
			$time_ = "2:".$min." PM";
		}
	}
	else if($time_ >= 1500 && $time_ < 1600)
	{
		$min = $time_ - 1500;
		if($min == 0)
		{
			$time_ = "3:00 PM";
		}
		else
		{
			$time_ = "3:".$min." PM";
		}
	}
	else if($time_ >= 1600 && $time_ < 1700)
	{
		$min = $time_ - 1600;
		if($min == 0)
		{
			$time_ = "4:00 PM";
		}
		else
		{
			$time_ = "4:".$min." PM";
		}
	}
	return $time_;
}
function getID($first, $last)
{
	global $debug; global $COMMON;
	$sql = "select `ID` from advisors where `fname` = '$first' AND `lname` = '$last'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	return $row['ID'];
}
function getName($id)
{
	global $debug; global $COMMON;
	$sql = "select `fname`, `lname` from advisors where `ID` = '$id'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs);
	
	$fullName = $row['fname']." ".$row['lname'];
	
	if($fullName == " ")
	{
		$fullName = "Group";
	}
	return $fullName;
}
function checkDate_($date1)
{
	global $debug; global $COMMON;
	$sql = "select `num1` from appointments2 where `date1` = '$date1'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	if($row['num1'] != NULL)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function checkAdDate($date1, $id)
{
	global $debug; global $COMMON;
	$sql = "select `num1` from appointments2 where `date1` = '$date1' AND (`ID` = '$id' OR `ID` = -1 OR `ID` = -2)";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	if($row['num1'] != NULL)
	{
		return true;
	}
	else
	{
		return false;
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
?>