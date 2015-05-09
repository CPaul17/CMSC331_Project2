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
<body>
	
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
	<br>

	<br>

	<div class="centerMenu">


	
	<P ALIGN="CENTER"><FONT SIZE="6"><U>Main Menu</U></FONT>
	<br>	

	<br>
	<br>
<!-- 	<a href="individualPage.php"><button type="button" class="button go large">Schedule Individual</button></a> -->
<!-- 	<a href="individualPage.php"><button type="button" class="Button" style="height:50px;width:200px;background-color: #66AA44;color:#FFF;border-radius: 8px;"><big><b>Schedule Individual</b></big></button></a> -->
	<a href="individualPage.php"><button type="button" class="button go large" style="height: 40px; width: 210px"><big><b>Schedule Individual</b></big></button></a>
	<br>	
	<br>
	<br>	
	<br>

<!-- 	<a href="groupPage.php"><button type="button" class="button go large">Schedule Group</button></a> -->
	<a href="groupPage.php"><button type="button" class="button go large" style="height: 40px; width: 210px"><big><b>Schedule Group</b></big></button></a>

	<br>
	<br>
	<br>	
	<br>	

<!-- 	<a href="addAdvisor.php"><button type="button" class="button go large" >Add Advisors</button></a> -->
	<a href="addAdvisor.php"><button type="button" class="button go large" style="height: 40px; width: 210px"><big><b>Add Advisors</b></big></button></a>
	<br>	
	<br>
	<br>
	<br>

<!-- 	<a href="printingPage.php"><big><button type="button" class="button go large" >Print Schedule</button></big></a> -->
	<a href="printingPage.php"><big><button type="button" class="button go large" style="height: 40px; width: 210px" ><big><b>Print Schedule</b></big></button></big></a>

</div>

	</P>	
</body>
</html>