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

	</P>
<style>
.Button
    {
        
    }
</style>
</head>

<body>
<br><br><br><br>

<div class="centerInd">

<P ALIGN="CENTER"><FONT SIZE="5"><U>Schedule Individual Advising Availability</U></FONT>

<br><FONT SIZE="1"><br></FONT>
<FONT SIZE="3">* Availability larger than 30 minutes will be broken up into 30 minute blocks.*
<br>
</FONT>
</P>
<br>
<form action='individualUpdate.php' method='post' name='form1'><center><FONT FACE="Times New Roman" SIZE = "3">Date: 
<?php
	include("datePickerCode.php");
?>
</FONT></center>
<br>
<br>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">First Name: <input type='text' name='fname'>      Last Name: <input type='text' name='lname'>
<br>

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
</select>                                    Availability End Time:  <select name='endHour'>
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
</select>                                                                         
</FONT>

<!-- <br>
<br>
<br>
<br>
<br>
<br>
<br>
 -->
<div style = "margin-top: -130px"/>

</div>


<br>
<br>
<center><input type='submit' value="Submit" class="button go large"></center>

<br>
</form>



<P ALIGN="CENTER">
<!-- <div style = "margin-top: 190px"/>

</div>
 -->

		<div style = "margin-top: -160px"/>
<center><a href="adminMenu.php"><button type="button" class="button go large">Main Menu</button></a></center>

 </div>

	<div style = "margin-top: -170px"/>
	</div>


 </div>

</P>
</body>
</html>