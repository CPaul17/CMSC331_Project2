<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}

	//include("cssCode.html");
	//include("cssCode2.html");
	
?>
<html>
<head>
	<div id="security-tip">
      <div class="content">
	<P ALIGN="CENTER"><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT>
	<br><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT>
	</P>
</div>
</div>


</head>
<body>
	
	 <center><FONT SIZE=5> I'm going to type stuff here about how stuff works.</FONT> </center>
	<center><FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM></center>
	
</body>
</html>