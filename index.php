<html>
<head>
<!-- Format background and border for page -->
<style>
#header {
	background-color:yellow;
	border: 10px solid black;
	padding:10px;
	color:black;
	text-align:center;
	font-size: 40px;
}
#section {
	border: 10px solid black;
	height: 1000px;
	padding:30px;
	text-align:center;
	font-size: 40px;
}
</style>

</head>
<body>

<!-- page banner -->
<div id="header">
<h1>UMBC Student Advising</h1>
</div>

<div id="section">
<form action='studentLogin'>
<input type="submit" style="font-size:100pt" name="submitted" value="Student">
</form>

<form action='adminLogin'>
<input type="submit" style="font-size:100pt" name="submitted" value="Admin">
</form>

</div>
</body>
</html>

