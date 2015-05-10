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

	$num = $_POST['num'];
	
	changeCapacity($num);

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

echo("</head>");
echo("<body>");
	echo("<CENTER>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
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