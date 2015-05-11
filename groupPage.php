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

<style>
.Button
    {
       
    }
</style>
</head>

<body>
<br><br><br><br>

<div class="centerGroup">

<P ALIGN="CENTER"><FONT SIZE="5"><U>Schedule Group Advising Availability</U></FONT>
<br><FONT SIZE="1"><br></FONT>
<FONT SIZE="3">* Availability larger than 30 minutes will be broken up into 30 minute blocks.*
<br>
</FONT>
</P>
<form action='groupUpdate.php' method='post' name='form1'>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">
Availability Start Time: <select name='startHour'>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select> : <select name='startMin'>
				<option value="00">00</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="45">45</option>
			</select> <select name='stimofday'>
  <option value="am">AM</option>
  <option value="pm">PM</option>
</select>                   Date: <select name='month'>
				<option value='1'>Jan</option>
				<option value='2'>Feb</option>
				<option value='3'>Mar</option>
				<option value='4'>Apr</option>
				<option value='5'>May</option>
				<option value='6'>Jun</option>
				<option value='7'>Jul</option>
				<option value='8'>Aug</option>
				<option value='9'>Sep</option>
				<option value='10'>Oct</option>
				<option value='11'>Nov</option>
				<option value='12'>Dec</option>
				</select> / <input type ='number' name='day' min='1' max='31' value='1' style="width:45px;"> / <input type='number' name='year' min='2015' value='2015' style="width:55px;">
<br>
Availability End Time:  <select name='endHour'>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			</select> : <select name='endMin'>
				<option value="00">00</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="45">45</option>
			</select> <select name='etimofday'>
  <option value="am">AM</option>
  <option value="pm">PM</option>
</select>                                             Capacity:  <select name='capacity'>
			<option value="10">10</option>
			<option value="5">5</option>
</select>
<br>
<div align="center">Major: <select name='major'>
				<option value="ALL">ALL</option>
				<option value="CMSC">CMSC</option>
				<option value="CMPE">CMPE</option>
				<option value="ENCH">ENCH</option>
				<option value="ENME">ENME</option>
				<option value="EGNR">EGNR</option>
</select>
</div>
</FONT>

<!-- </div> -->

<div style = "margin-top: -120px"/>
	</div>


<!-- <div class="fieldLogin">
	<div class="center2"> -->
<center><input type='submit' value="Submit" class = "button go large" > </P></pre></center>
<!-- </div>
</div>
 --></form>
<P ALIGN="CENTER">
	
<!-- <div class="fieldLogin">
	<div class="center5"> -->

<center><a href="adminMenu.php"><button type="button" class="button go large">Main Menu</button></a></center>
</P>



</div>
</body>
</html>