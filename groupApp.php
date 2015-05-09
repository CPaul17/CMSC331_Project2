<?php
// File: groupApp.php
// Name: Cory Stoner
// Email: corys1@umbc.edu
// Class: CMSC 331
// Instructor: Lupoli
// Description: Shows options for days available for group advising

include ("cssCode.html");
include ("cssCode2.html");
?>


<html>
<head>
<!-- Format background and border for page -->



</head>
<body>


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

<div class = "center">
<P ALIGN="CENTER"><FONT SIZE="4"><U><big><b>Group Advising</b></big></U></FONT></P>	

<br>
<br>

<form method="post" action="timesGroup.php">

<!-- Group advising is only offered 3 days per week -->
<FONT SIZE="4"><big><b> Day: </b></big></FONT>

<select style="font-size: 23pt" name='groupDay'>
<option value='2015-03-23'>Monday, March 23</option>
<option value='2015-03-25'>Wednesday, March 25</option>
<option value='2015-03-27'>Friday, March 27</option>
<option value='2015-03-30'>Monday, March 30</option>
<option value='2015-04-01'>Wednesday, April 1</option>
<option value='2015-04-03'>Friday, April 3</option>

</select>
<br>
<br>
<br>
<br>

<center>
<input type="submit" class="button go large" style="font-size: 15pt"
 value="See Times"><br>
</form>

<br>

<form action="appOption.php">
<input type="submit" class="button go large" style="font-size: 15pt" value="Previous">
</center>
</form>

</div>
</body>
</html>