<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}
	



	$debug=false;
	include('../CommonMethods.php');
	$COMMON = new Common($debug);
	

	include("cssCode.html");
	include("cssCode2.html");

		$sql = "select * from advisors order by `lname` ASC";

		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);


		//include("header.html");
echo("<div id=\"security-tip\">");
echo("<div class=\"content\">"); 
echo("<div style=\"float:left\"><a href=\"adminHelp.php\"><button type=\"button\" class =\"button go large\" style=\"height:30px;width:80px\">Help</button></a></div>");
echo("<div style=\"float:right\"><a href=\"logout.php\"><button type=\"button\" class =\"button go large\" style=\"height:30px;width:80px\">Log Out</button></a></div>");
echo("<center><FONT SIZE=\"7\" COLOR=\"RED\"><U>UMBC</U></FONT><center>");
echo("<center><FONT SIZE=\"4\">College of Engineering <br>and Information Technology</FONT></center>");
echo("<div style=\"clear: both;\"></div>");
echo("</div>");
echo("</div>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");
echo("<br>");

		echo("<center>");


		echo("<br>");
		echo("<P ALIGN=\"CENTER\">");
		echo("<a href=\"addAdvisor.php\"><button type=\"button\" class=\"button go large\" style=\"height:40px;\">Back to Adding Advisor</button></a>");
		echo("</P>");
		echo("<br>");
		// echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
		// echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
		echo("<style>table tr:nth-child(even) {background-color: #F2F5A9;}</style>");
		echo("<style>table tr:nth-child(odd) {background-color: #F5A9A9;}</style>");
		#B93936
		// echo("<style>table th {color:white;background-color:black;}</style>");
		echo("<style>table th {color:white;background-color:#122232;}</style>");
		echo("<style>table th, td {padding:20px;}</style>");
		echo("<P ALIGN=\"CENTER\">"); 
		echo("<FONT SIZE=\"5\"><U>Advisors</U></FONT>");
		echo("<br>");
		echo("<br>");
		// echo("<table border='5px' style=\"border:solid black;border-collapse:collapse;text-align:center;\"");
		echo("<table border='5px' style=\"border: #122232;border-collapse:collapse;text-align:center;\"");
		
		echo("<tr>");
		echo("<th>"."<FONT SIZE=5>"."Last"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."First"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Email"."</FONT>"."</th>");
		echo("<th>"."<FONT SIZE=5>"."Delete"."</FONT>"."</th>");
		echo("</tr>");
		echo("<tr>");
		while($row = mysql_fetch_array($rs))
		{	
			echo("<tr>");
			echo("<td>".$row['lname']."</td>");
			echo("<td>".$row['fname']."</td>");
			echo("<td>".$row['email']."</td>");
			echo("<form action='deleteAdvisor.php' method='post' name='form2'>");
			echo("<input type=\"hidden\" name=\"lname\" value=\"".$row['lname']."\">");
			echo("<input type=\"hidden\" name=\"fname\" value=\"".$row['fname']."\">");
			echo("<td><input type='submit' onclick=\"return confirm('Are you sure?')\" value=\"Delete\" class=\"button go large\"></td></form>");

			echo("</tr>");	
		}
		echo("</table>");
		echo("</P>");

		echo("</center>");
?>