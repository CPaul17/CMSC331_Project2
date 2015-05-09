<?php
	session_start();
?>
<?php
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
<div class="center">
<P ALIGN="CENTER"><FONT SIZE="5"><U><big><b>Advising Administrator Log-in</b></big></U></FONT></P>	
<P ALIGN="CENTER"><FONT SIZE="3">(Enter 'password' for the Administrator Password in order to log in.)</FONT></P>

<br>
<div class="fieldUsername">

<form action='login.php' method='post' name='form1'>

<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">Username: <input type='text' name='uname'>      
</div>

<!-- <div class="field2"> -->
<center>Administrator Password: <big><input type='password' name='adminPass'></big></center>
<!-- </div> -->

<br>
<br>


<!--<input type='submit' value="Log in" style="width:100px;height:60px;background-color:black;color:yellow;"> </P></pre> -->
<!-- <div class="fieldLogin"> -->
<center><input type='submit' value="Log in" class="button go large"></center>
<!-- </div> -->


<!-- </div>
 -->
</form>
</body>
</html>
