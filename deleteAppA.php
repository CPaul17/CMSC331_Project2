<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}
	
	include("cssCode.html");
	include("cssCode2.html");

	$debug=false;
	include('../CommonMethods.php');
	$COMMON = new Common($debug);

	$num = $_POST['num'];
	$date = $_POST['date'];
	$time = $_POST['time'];	

	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];

	$startHour = $_POST['startHour'];
	$startMin = $_POST['startMin'];
	$endHour = $_POST['endHour'];
	$endMin = $_POST['endMin'];
	
	$allD = $_POST['allDays'];
	$allA = $_POST['allAds'];
	$allT = $_POST['allTimes'];

	deleteAppointment($num);
	
echo("<html>");
echo("<head>");
			echo("<div id=\"security-tip\">");
echo("<div class=\"content\">"); 
echo("<div style=\"float:left\"><a href=\"adminHelp.php\"><button type=\"button\" class =\"button go large\" style=\"height:30px;width:80px\">Help</button></a></div>");
echo("<div style=\"float:right\"><a href=\"logout.php\"><button type=\"button\" class =\"button go large\" style=\"height:30px;width:80px\">Log Out</button></a></div>");
echo("<center><FONT SIZE=\"7\" COLOR=\"RED\"><U>UMBC</U></FONT><center>");
echo("<center><FONT SIZE=\"4\">College of Engineering <br>and Information Technology</FONT></center>");
echo("<div style=\"clear: both;\"></div>");
echo("</div>");
echo("</div>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");

echo("</head>");
echo("<body>");
	echo("<br>");
	echo("<br>");

	echo("<div class=\"center\">");
	echo("<br>");
	echo("<P ALIGN=\"CENTER\"><FONT SIZE=\"5\">The appointment at ".convertTime($time)." on ".$date." has been removed.</FONT></P>");
	echo("<br>");
	echo("</div>");

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
	echo("<input type=\"hidden\" name=\"allTimes\" value=\"".$allT."\">");
	echo("<input type=\"hidden\" name=\"startHour\" value=\"".$_POST['startHour']."\">");
	echo("<input type=\"hidden\" name=\"startMin\" value=\"".$_POST['startMin']."\">");
	echo("<input type=\"hidden\" name=\"endHour\" value=\"".$_POST['endHour']."\">");
	echo("<input type=\"hidden\" name=\"endMin\" value=\"".$_POST['endMin']."\">");
	echo("<input type='submit' class=\"button go large\" value=\"Back\" style=\"width:150px;height:40px;\">");
	echo("</CENTER>");
echo("</body>");
echo("</html>");


	

function deleteAppointment($app)
{
	global $debug; global $COMMON;
		
	$sql = "delete from appointments2 where `num1` = '$app'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
}

function convertTime($time)
{
	$time_ = $time;
	$min;
	if($time_ >= 800 && $time_ < 900)
	{
		$min = $time_ - 800;
		if($min == 0)
		{
			$time_ = "8:00 AM";
		}
		else
		{
			$time_ = "8:".$min." AM";
		}
	}
	else if($time_ >= 900 && $time_ < 1000)
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

?>