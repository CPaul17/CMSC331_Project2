<?php
	$debug=false; session_start();
	include('CommonMethods.php');
	$COMMON = new Common($debug);
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	
	$eMail = $_POST['email'];
	
	if($eMail =="" || $eMail =="jdoe123" || $eMail == NULL)
	{
		if(checkAdvisors($firstName, $lastName))
		{
			addAdvisor($firstName, $lastName);
			header('Location: successfulAdvisorEntry.php');
		}
		else
		{
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor already exists in Database. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			
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
			echo("<P ALIGN=\"CENTER\">");
			echo("<FONT SIZE=\"5\">");
			echo("<mark>");
			echo("** Advisor already exists in Database. **");
			echo("</mark>");
			echo("</FONT>");
			echo("</P>");
			
			include("addAdvisor.php");
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