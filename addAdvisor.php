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



<style>



.Button
    {
        margin-left:150px;
	margin-right:150px
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
	<br>
<FONT SIZE="4"><U>Optional:</U></FONT>
	<br>
Email: <input type='text' name='email' value="jdoe123">@umbc.edu

</div>

	<br><br>
<center><input type='submit' value="Submit" class="button go large"> </P></pre></center>

<br>

	</FONT></P></pre>
	</form>


<!-- <center><a href="adminMenu.php"><button type="button" class="button go large" style="height:40px; width:150px; display: inline-block">Main Menu</button></a></center>	

<br>
 -->

<br>


<center><a href="adminMenu.php"><button type="button" class="button go large" style="height:40px; width:150px; display: inline-block">Main Menu</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="currentAdvisors.php"><button type="button" class="button go large" style="height:40px; display: inline-block">View Current Advisors</button></a></center>


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