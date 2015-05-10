<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}
	// include("header.html");
 	
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
<br>

<style>
rpad.padding { 
	padding-right: 25%;
}
</style>
<head>
<body>

	<div class="centerPrintPage">


	<br>
	<br>
	<P ALIGN="CENTER"><FONT SIZE="6"><U>Printing Options</U></FONT></P>
	<br>
	<P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE="4"><u>Enter a date or check 'All' for every day:</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u>Enter times or check 'All' for any time:</u></FONT></P>
	<form action='schedulePrinter.php' method='post' name='form1'>
	<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">
	 Date: <select name='month'>
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
				</select> / <input type ='number' name='day' min='1' max='31' value='1' style="width:45px;"> / <input type='number' name='year' min='2015' value='2015' style="width:55px;">   or All? <input type='checkbox' name='allDays'>                                 From <select name='startHour'>
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
			</select> to <select name='endHour'>
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
			</select> or All? <input type='checkbox' name='allTimes'>
	<br></FONT><br><FONT FACE="Times New Roman" SIZE = "4"><u>Enter a name or check 'All' to print for each advisor:</u></FONT>
	<FONT FACE="Times New Roman" SIZE = "3"><br>
	First Name: <input type='text' name='fname'>      Last Name: <input type='text' name='lname'>   or All? <input type='checkbox' name='allAds'>


</div>



<!-- </FONT><br><br><input type='submit' value="Print Schedule" style="width:150px;height:100px;background-color:yellow;font-size:20;">  -->
<center></FONT><br><br><input type='submit' value="Print Schedule" class="button go large" style="width:150px;height:40px;"> </center>
	</P></pre>
	</form>
<P ALIGN="RIGHT">
<br>
<!-- <rpad class="padding"><a href="adminMenu.php"><button type="button" style="height:25px;background-color:red;color:white;">Main Menu</button></a></rpad>
 -->
 <rpad class="padding"><a href="adminMenu.php"><button type="button" class ="button go large" style="height:30px;">Main Menu</button></a></rpad>
</P>

</body>
</html>