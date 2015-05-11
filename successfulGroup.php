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


?>

<html>
  <style>
    .Button
    {
        margin:30px;
    }
    </style>
<head>
	<div id="security-tip">
      <div class="content"> 
	<div style="float:left"><a href="adminHelp.php"><button type="button" class ="button go large" style="height:30px;width:80px">Help</button></a></div>
	<div style="float:right"><a href="logout.php"><button type="button" class ="button go large" style="height:30px;width:80px">Log Out</button></a></div>
	<center><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT><center>
	<center><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT></center>
	<div style="clear: both;"></div>
	</div>
	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<head>
<body>
	<br>
	<br>
	<div class="center">
	<P ALIGN="CENTER"><FONT SIZE="6">Schedule updated!
	<br>
	Thank You</FONT>
<!-- </div> -->
	<br>
	<br>
	<br>


<center><a href="groupPage.php"><button type="button" class="button go large">Return to Group</button></a></center>

<br>

<center><a href="adminMenu.php"><button type="button" class="button go large">Main Menu</button></a></center>


</div>
</body>
</html>
