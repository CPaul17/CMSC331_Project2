<?php
	// include("header.html");
 	
	include("cssCode.html");
	include("cssCode2.html");
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
	<P ALIGN="CENTER"><FONT SIZE="4">Enter a date or check 'All' to print for every day:</FONT></P>
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
				</select> / <input type ='number' name='day' min='1' max='31' value='1' style="width:45px;"> / <input type='number' name='year' min='2015' value='2015' style="width:55px;">   or All? <input type='checkbox' name='allDays'>
	<br></FONT><br><FONT FACE="Times New Roman" SIZE = "4">Enter a name or check 'All' to print for each advisor:</FONT>
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