<?php

	include("cssCode.html");
	include("cssCode2.html");


?>

<html>
<head>
	<div id="security-tip">
      <div class="content">

	<P ALIGN="CENTER"><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT>
	<br><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT>
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
<br><br>

<div class="centerInd">

<P ALIGN="CENTER"><FONT SIZE="5"><U>Schedule Individual Advising Availability</U></FONT>

<br><FONT SIZE="1"><br></FONT>
<FONT SIZE="3">* Availability larger than 30 minutes will be broken up into 30 minute blocks.*
<br>
</FONT>
</P>
<br>
<form action='individualUpdate.php' method='post' name='form1'>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">First Name: <input type='text' name='fname'>      Last Name: <input type='text' name='lname'>
<br>
Availability Start Time: <select name='startHour'>
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


</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div style = "margin-top: -70px"/>

</div>



<center><input type='submit' value="Submit" class="button go large"></center>


</form>


<P ALIGN="CENTER">
<div style = "margin-top: 190px"/>

</div>


		<div style = "margin-top: -160px"/>
<center><a href="adminMenu.php"><button type="button" class="button go large">Main Menu</button></a></center>

 </div>


</P>
</body>
</html>