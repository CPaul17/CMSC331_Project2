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
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
	$eMail = $_POST['email'];
	if($firstName == "" || $lastName == "")
	{
			echo("<br>");
			echo("<br>");	
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");

			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor must have a first and last name. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			echo("<div style = \"margin-top: -157px\">");
			echo("</div>");
			
			include("addAdvisor.php");
	}
	else
	{
	if($eMail =="" || $eMail =="jdoe123" || $eMail == NULL)
	{
		if(checkAdvisors($firstName, $lastName))
		{
			addAdvisor($firstName, $lastName);
			header('Location: successfulAdvisorEntry.php');
		}
		else
		{

			echo("<br>");
			echo("<br>");	
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");

			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor already exists in Database. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			echo("<div style = \"margin-top: -157px\">");
			echo("</div>");
			
			include("addAdvisor.php");
		}
	}
	else
	{
		$eMail = $eMail."@umbc.edu";
		if(checkAdvisors($firstName, $lastName))
		{
			addAdvisorE($firstName, $lastName, $eMail);
			header('Location: successfulAdvisorEntry.php');
		}
		else
		{

			echo("<br>");
			echo("<br>");	
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");
			echo("<br>");

			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor already exists in Database. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			echo("<div style = \"margin-top: -100px\">");
			echo("</div>");
			
			include("addAdvisor.php");
		}
	}
	}
function addAdvisor($first, $last)
{
	global $debug; global $COMMON;
	$sql = "insert into advisors (`lname`, `fname`) values ('$last', '$first')";
	$rs = $COMMON->executeQuery($sql, __FILE__);
}
function addAdvisorE($first, $last, $e_mail)
{
	global $debug; global $COMMON;
	$sql = "insert into advisors (`lname`, `fname`, `email`) values ('$last', '$first', '$e_mail')";
	$rs = $COMMON->executeQuery($sql, __FILE__);
}
function checkAdvisors($first, $last)
{
	global $debug; global $COMMON;
	$sql = "select `ID` from advisors where `fname` = '$first' AND `lname` = '$last'";
	$rs = $COMMON->executeQuery($sql, __FILE__);
	$row = mysql_fetch_array($rs); // collects row data into an array named row
	if ($row['ID'] == NULL)
	{
		return true;
	}
	else
	{
		return false;
	}

}

?>