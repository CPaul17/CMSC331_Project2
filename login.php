<?php
$username = $_POST['uname'];
$password = $_POST['pass'];
$adminPass = $_POST['adminPass'];
if($adminPass == "password" && $username != "" && $password != "")
{
	header('Location: adminMenu.php');
}
else
{
	echo("<P ALIGN=\"CENTER\">");
	echo("<FONT SIZE=\"5\">");
	echo("<mark>");
	echo("** Log-in attempt failed. Invalid administrator password. **");
	echo("</mark>");
	echo("</FONT>");
	echo("</P>");
	include("adminLogin.php");
}
?>