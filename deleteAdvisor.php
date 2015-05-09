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
	
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	
	deleteAdvisor($lname, $fname);




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
	echo("<P ALIGN=\"CENTER\"><FONT SIZE=\"6\"> ".$fname." ".$lname." has been deleted!");

	echo("<br>");
	echo("<br>");
	echo("Thank You</FONT>");
	echo("</div>");
	echo("<br>");
	echo("<br>");
	echo("<br>");
	
	echo("<center><a href=\"currentAdvisors.php\"><button type=\"button\" class=\"button go large\">Back</button></a></center>");
echo("</body>");
echo("</html>");

function deleteAdvisor($l, $f)
{
	$ID = getID($f, $l);
	global $debug; global $COMMON;
		
	$sql = "delete from advisors where `lname` = '$l' AND `fname` = '$f'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	
	$sql = "delete from appointments2 where `ID` = '$ID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
}
function getID($first, $last)
{
	global $debug; global $COMMON;
	$sql = "select `ID` from advisors where `fname` = '$first' AND `lname` = '$last'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	return $row['ID'];
}	
?>