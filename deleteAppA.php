<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}
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

	$allD = $_POST['allDays'];
	$allA = $_POST['allAds'];
	
	deleteAppointment($num);
	
	include("header.html");
	echo("<br>");
	echo("<P ALIGN=\"CENTER\"><FONT SIZE=\"5\">The appointment at ".convertTime($time)." on ".$date." has been removed.</FONT></P>");
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

?>