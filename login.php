<?php
	session_start();
?>
<?php
	$adminPass = $_POST['adminPass'];

// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");

// echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");

// echo("<br>");
// 	echo("<br>");
// 	echo("<br>");
// 	echo("<br>");


// 	echo("this is the uname: $username");
// 		echo("<br>");

// 	echo("this is the pass: $password");
// 		echo("<br>");

// 	echo("this is the adminPass: $adminPass");
// 		echo("<br>");


	if($adminPass == "password")
	{
		$_SESSION["login"] = 1;
		header('Location: adminMenu.php');
	}


	 include("cssCode.html");
	 include("cssCode2.html");

// #example2 {
// 	    border: 10px black;
//     	padding: 35px;
//     	background: #CCCCCC;
//     	background-clip: padding-box;
// 	}

?>


<html>


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
<br>
<br>

<br>
<!-- <div class="center"> -->
<div class="centerGroup">
<P ALIGN="CENTER"><FONT SIZE="5"><U><big><b>Advising Administrator Log-in</b></big></U></FONT></P>	
<P ALIGN="CENTER"><FONT SIZE="3">(Enter 'password' for the Administrator Password in order to log in.)</FONT></P>

<br>
<div class="fieldUsername">

<form action='login.php' method='post' name='form1'>
</div>

<div class="field2">
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <FONT FACE="Times New Roman" SIZE = "3">Administrator Password: <input type='password' name='adminPass'>
<br>
</div>

<br>

<!--<input type='submit' value="Log in" style="width:100px;height:60px;background-color:black;color:yellow;"> </P></pre> -->
<div class="fieldLogin">
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='submit' value="Log in" class="button go large">
</div>

<br>

<center><font size="4" color="red"><b><u> Incorrect Login Information</u></b></font></center>
<br>

</div>
<!-- </div>
 -->
</form>
</body>
</html>
