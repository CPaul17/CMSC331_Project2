<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

//blank string to append any error messages to
$errorMsg = "";

//variables to hold the student's information if it is accepted
$fName = $lName = $idNum = "";

//checks if the page has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//checks if first name was empty
	if(empty($_POST["fName"])){
//		$errorMsg .= "<br>First name is required.";
		$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> First name is required.</u></b></font>";			
	}
	else{
		$fName = $_POST["fName"];

		//checks if first name is too long or has non-alphabetic characters
		if(strlen($fName) > 25 || ctype_alpha($fName) == false){
//			$errorMsg .= "<br>First name can only be letters,
//				       and must be less than 25 characters.";
			$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> First name can only be letters,
			and must be less than 25 characters.</u></b></font>";				       
		}
	}
	//checks if last namem was empty
	if(empty($_POST["lName"])){
//		$errorMsg .= "<br>Last name is required.";
		$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> Last name is required.</u></b></font>";		
	}
	else{
		$lName = $_POST["lName"];

		//checks if last name is too long or has non-alphabetic characters
		if(strlen($lName) > 25 || ctype_alpha($lName) == false){
//			$errorMsg .= "<br>Last name can only be letters,
//				       and must be less than 25 characters.";

			$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> Last name can only be letters,
			and must be less than 25 characters.</u></b></font>";				       
		}

	}
	//checks if ID was empty
	if(empty($_POST["idNum"])){
//		$errorMsg .= "<br>ID is required.";
		$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> ID is required.</u></b></font>";

	}
	else{
		$idNum = $_POST["idNum"];

		//checks if ID was not equal to 7 characters
		if(strlen($idNum) != 7){
//			<center><font size="4" color="red"><b><u> Incorrect Login Information</u></b></font></center>
			// $errorMsg .= "<br>ID number must be 7 characters in length.";
			$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> ID number must be 7 characters in length.</u></b></font>";			
		}
		//checks if ID has non-alphanumeric characters
		if(ctype_alnum($idNum) == false){
//			$errorMsg.= "<br>ID number can only contain letters and numbers.";
			$errorMsg .= "<br><font size=\"4\" color=\"red\"><b><u> ID number can only contain letters and numbers.</u></b></font>";			
		}
	}
	
	//checks if any errors were recorded
	if($errorMsg == ""){
		$major = $_POST["major"];
		
		//inserts the student information into database, ignoring duplicates
		$sql = "insert ignore into StudentInfo (`ID`, `FName`, `LName`, `Major`) 
			values ('$idNum', '$fName', '$lName', '$major')";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

		//stores ID as session variable for future use
		$_SESSION['idNum'] = $idNum;
		$_SESSION['major'] = $major;

		//redirects to options page
		header('Location: appOption.php');
		exit();
	}
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <style type="text/css">

<!--   html { background-color: #f5ca5c; font-family: Arial; font-size: 13px; position: relative; }-->
	  html { background-color: #f5ca5c; font-family: Arial; font-size: 13px; position: relative; } 
	  body { margin: 0; padding: 0; }
	  a { color: #07f; text-decoration: none; }
	  a:hover { text-decoration: underline; }

<!--      #login { color: #000; background-color: #fff; margin: 120px auto 0; padding: 20px 20px 20px; position: relative; width: 280px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; } -->

<!-- this changes the color right begind the login page -->
      #login { color: #000; background-color: #CCCCCC; margin: 120px auto 0; padding: 20px 20px 20px; position: relative; width: 280px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; }

      #security-tip { position: absolute; top: 0; left: 0; width: 100%;  }
      #security-tip .content { overflow: hidden; margin: 8px; background-color: #122232; color: #FFF; padding: 8px 16px; -webkit-border-radius: 8px; -moz-border-radius: 8px; }
      #security-tip img { vertical-align: middle; }
      #security-tip .primary { float: left; }
      #security-tip .secondary { float: right; }
 

	      h1 { font-family: "Helvetica Neue", Arial, Helvetica, sans-serif; font-size: 28px; line-height: 32px; margin: 0; padding: 0; }
	      ul { margin: 8px 20px; padding: 0; }
	      li { margin-top: 8px; }


	      input[type="text"], textarea {

		background-color: #F3F3F3;
		border: 1px solid #999;
		color: #666;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
		line-height: 16px;
	      padding: 4px;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
	      width: 262px;
	      } 

      
	      .button {
		background-color: #768089;
		border: none;
	      color: #fff;
	      cursor: pointer;
	      display: inline-block;
		font-size: 11px;
		font-weight: bold;
	      height: 25px;
	      overflow: visible;
	      padding: 0 12px;
	      margin: 0;
		text-decoration: none;
		vertical-align: top;
		white-space: nowrap;
	      width: auto;
		-moz-appearance: none;
		-moz-border-radius: 4px;
		-webkit-appearance: none;
		-webkit-border-radius: 4px;
		line-height: 25px;
	      }
      
	  .button:hover {
		background-color: #87929D;
		color: #fff;
		text-decoration: none;
	      }
      
	      a.button.large {
		line-height: 32px;
	      }
      
	      .button.large {
		font-size: 16px;
	      height: 32px;
	      padding: 0 16px;
	      }
      
	      .button.go {
		background-color: #66AA44;
		color: #FFF;
	      }
      
	  .button.go:hover {
		background-color: #70B74E;
		color: #FFF;
	      }
      
	      .button.stop {
		background-color: #CC4444;
		color: #FFF;
	      }
      
	  .button.stop:hover {
		background-color: #d55;
	      }
      
	      input[type="password"] { font-weight: bold; letter-spacing:3px} 
      
	      .field { margin: 8px 0; }
	      .field label { display: block; font-weight: bold; font-size: 14px; }
	      .actions { text-align: right; }
	      .bottom { border-top: 0px solid #ddd; padding-top: 12px; font-size: 11px; color: #666;}
			.top { border-bottom: 1px solid #eee; padding-bottom: 12px; }
			       .actions { overflow: hidden; }
			       .actions .secondary { float: left; font-size: 14px; line-height: 32px; text-align: left; }
			       .create-account { padding: 12px 0; border-top: 0px solid #ddd; margin-top: 0px; }
						 .logout-warning { color: #CC4444; font-size: 14px; font-weight: bold; padding-top: 12px; }
		      .logout-warning .first { font-size: 12px; }
		      .logout-warning .second { font-size: 16px; }
		      p { margin: 0; padding: 0; }
		      .login-create { font-size: 16px; font-weight: normal; }
		      .error { background-color: #CC4444; color: #fff; margin: 8px 0 16px; padding: 6px 12px; -webkit-border-radius: 4px; -moz-border-radius: 4px; text-align: center; font-weight: bold }
      
			.button-item { line-height: 32px; margin: 8px 0px 12px; }
			.button-item .button { margin-right: 4px; width: 70px; padding: 0 8px; text-align: center; }
      
			@media screen and (max-width: 767px) {
			  html, body { background-color: #fff; }
        #logo { left: 8px; }
        #security-tip { display: none; }
        #login { border-radius: 0; margin: 60px 0 0; width: 94%; padding: 3%; border-top: 1px solid #ddd; }
			    input[type="text"],input[type="password"], textarea { width: 96%; padding: 2% 2%; }
			    .button-item { margin: 8px 8px 12px; }
			  }

    </style>
  </head>
    <body>
	


  <!-- Page banner -->
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

        <div class="secondary">

        </div>
      </div>
    </div>

    <div id="login" >
      <div id="logo"><a href="#" title="myUMBC Home"></a></div>
      <div id="form">
        <div class="top">

    <form action = 'studentLogin.php' method='post' name='form1'> 


  <h1>Student Log In<span class="login-create"> 
	

 <div class="field">
    <label for="firstname">First Name</label> 

    <input id="firstname" size="20" maxlength="255" type="text" name="fName">
  </div>

 <div class="field">
    <label for="lastname">Last Name</label>
    <input id="lastname" size="20" maxlength="255" type="text" name="lName">
  </div>

  <div class="field">
    <label for="umbcID">UMBC ID</label>
    <input id="umbcID" size="20" maxlength="255" type="text" name="idNum">
  </div>

<!--  <div class="field"> 
    <label for="major">Major</label>
    <input id="major" size="20" maxlength="255" type="text" name="major">
  </div>
-->

  <div class="field"> 
    <label for="major">Major</label>
    <select name = "major" input id="major" size="1" maxwidth="255" type="text">
        <option value="CMSC">CMSC </option>
        <option value="CMPE">CMPE </option>
        <option value="ENCH">ENCH </option>
        <option value="ENME">ENME </option>
    </select>

  </div>


  
  <div class="actions">
    <div class="secondary">

    <div class="primary">
<input value="Log In" class="button go large" type="submit"> 			 

    </div>
  </div>

</form>
</form>	 

<form action = 'index.php' method='post' name='form2'> 
    <div class="primary">
<input value="Previous" class="button go large" type="submit"> 			 
</div>

</body>
<?php
//prints any errors the page encounters
echo $errorMsg;
?>
</html>

