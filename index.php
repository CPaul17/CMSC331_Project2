<?php
include("header.html");
?>

<html>
<body>
<br>
<P ALIGN="CENTER"><FONT SIZE="5"><U>Advising Administrator Log-in</U></FONT></P>
<P ALIGN="CENTER"><FONT SIZE="3">(Enter 'username' for Username and 'password' for Password to log in.)<FONT></P>
<P ALIGN="CENTER"><FONT SIZE="3">(The log-in feature will have more functionality when connected to an accounts database.)<FONT></P>
<br>
<form action='login.php' method='post' name='form1'>
<pre><P ALIGN="CENTER"><FONT FACE="Times New Roman" SIZE = "3">Username: <input type='text' name='uname'>      Password: <input type='password' name='pass'></FONT>
<br>
<input type='submit' value="Log in" style="width:100px;height:60px;background-color:black;color:yellow;"> </P></pre>
</form>
</body>
</html>
