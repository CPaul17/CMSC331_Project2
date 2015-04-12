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
<br>
<P ALIGN="CENTER"><FONT SIZE="5"><U>Add an Advisor</U></FONT></P>
	<br>
	<form action='advisorUpdate.php' method='post' name='form1'>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">First Name: <input type='text' name='fname' value="John">      Last Name: <input type='text' name='lname' value="Doe">
	<br>
<FONT SIZE="4"><U>Optional:</U></FONT>
	<br>
Email: <input type='text' name='email' value="jdoe123">@umbc.edu
	<br><br>
<input type='submit' value="Submit" style="width:100px;height:60px;background-color:black;color:white;"> </P></pre>

	</FONT></P></pre>
	</form>
	<P ALIGN="CENTER">
<a href="schedulingPage.php"><button type="button" class="Button" style="height:50px;background-color:red;color:white;">Return to Scheduling</button></a>	
<a href="currentAdvisors.php"><button type="button" class="Button" style="height:50px;background-color:yellow;">View Current Advisors</button></a>
</P>
</body>
</html>