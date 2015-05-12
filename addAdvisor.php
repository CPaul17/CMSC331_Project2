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
<br>



<style>



.Button
    {
        
    }
</style>

</head>

<body>
<br>

<div class = "centerInd">

<P ALIGN="CENTER"><FONT SIZE="5"><U>Add an Advisor</U></FONT></P>
	<br>
	<form action='advisorUpdate.php' method='post' name='form1'>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">First Name: <input type='text' name='fname' value="John">      Last Name: <input type='text' name='lname' value="Doe">
<!-- 	<br> -->
<FONT SIZE="4"><U>Optional:</U></FONT>
<!-- 	<br> -->
Email: <input type='text' name='email' value="jdoe123">@umbc.edu

<!-- </div> -->


<center><input type='submit' value="Submit" class="button go large"> </P></pre></center>


	</FONT></P></pre>
	</form>


<!-- <center><a href="adminMenu.php"><button type="button" class="button go large" style="height:40px; width:150px; display: inline-block">Main Menu</button></a></center>	

<br>
 -->

<br>


<!-- <center><a href="adminMenu.php"><button type="button" class="button go large" style="height:40px; width:150px; display: inline-block">Main Menu</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="currentAdvisors.php"><button type="button" class="button go large" style="height:40px; display: inline-block">View Current Advisors</button></a></center> -->

<center><a href="adminMenu.php"><button type="button" class="button go large" style="height:40px; width:150px; display: inline-block">Main Menu</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="currentAdvisors.php"><button type="button" class="button go large" style="height:40px; display: inline-block">View Current Advisors</button></a></center>

</div>

<!-- &nbsp>
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
&nbsp
 -->

<!-- <center><a href="currentAdvisors.php"><button type="button" class="button go large" style="height:40px; display: inline-block">View Current Advisors</button></a></center>
 -->


</body>
</html>