<?php
$username = $_POST['uname'];
$password = $_POST['pass'];

if($username == "username" && $password == "password")
{
	header('Location: schedulingPage.php');
}
else
{
	echo("<P ALIGN=\"CENTER\">");
	echo("<FONT SIZE=\"5\">");
	echo("<mark>");
	echo("** Log-in attempt failed. Invalid username or password. **");
	echo("</mark>");
	echo("</FONT>");
	echo("</P>");
	include("index.php");
}
?>