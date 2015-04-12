<html>
<head>
	<P ALIGN="CENTER"><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT>
	<br><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT>
	</P>
<style>
.Button
    {
        margin-left:150px;
	margin-right:150px
    }
</style>
</head>

<body>
<br><br>
<P ALIGN="CENTER"><FONT SIZE="5"><U>Schedule Advising Availability</U></FONT>
<br><FONT SIZE="1"><br></FONT>
<FONT SIZE="3">* Availability larger than 30 minutes will be broken up into 30 minute blocks.*
<br>
*All blocks will be either group or individual, as specified.*
<br>
*If 'Group?' is unchecked, the availability will default to individual.*</FONT>
</P>
<br>
<form action='scheduleUpdate.php' method='post' name='form1'>
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
</select>                                     Group? <input type='checkbox' name='group'>                 
</FONT>
<br>
<br>
<br>
<input type='submit' value="Submit" style="width:100px;height:60px;background-color:red;color:white;"> </P></pre>
</form>
<P ALIGN="CENTER">
<a href="addAdvisor.php"><button type="button" class="Button" style="height:25px;background-color:black;color:white">Add Advisor</button></a>
<a href="printingPage.php"><button type="button" class="Button" style="height:25px;background-color:yellow;">Print Schedule</button></a>
</P>
</body>
</html>