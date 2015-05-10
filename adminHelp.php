<?php
	session_start();
?>
<?php
 	if($_SESSION["login"] != 1)
	{
		header('Location: index.php');	
	}

	include("cssCode.html");
	include("cssCode2.html");
	
?>
<html>
<head>
<style>
p.padding 
{
    padding-left: 1cm;
}
p.padding2 
{
    padding-left: 1.5cm;
}
p.padding3 
{
    padding-left: 2.5cm;
}

</style>
	<div id="security-tip">
      <div class="content">
	<P ALIGN="CENTER"><FONT SIZE="7" COLOR="RED"><U>UMBC</U></FONT>
	<br><FONT SIZE="4">College of Engineering <br>and Information Technology</FONT>
	</P>
</div>
</div>


</head>
<body>
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
	<center><FORM><INPUT Type="button" class="button go large" VALUE="Back" onClick="history.go(-1);return true;"></FORM></center>
<br>
	<div class="centerMenu">
	 <center><FONT SIZE=6><u>Contents</u></FONT>
	<br>
	<br><FONT SIZE=5><b><p><a href="#IA" style="color:#122232;">Individual Appointments</a></p>
	<br>
	<p><a href="#GA" style="color:#122232;">Group Appointments</a></p>
	<br>
	<p><a href="#AD" style="color:#122232;">Changing Advisors</a></p>
	<br>
	<p><a href="#SP" style="color:#122232;">Printing Schedules</a></p>
	<br>
	<p><a href="#CC" style="color:#122232;">Change or Delete Appointments</a></p></b>
	 </FONT></center>
	</div>
<br>
<br>
<br>
<br>
<br>
<h1><a id="IA"><p class="padding" style="color:black;"><u>Individual Appointments</u></p></a></h1>
<br>
<FONT SIZE=3>
<p class="padding2">- Use the <a href="individualPage.php">Individual Page</a> if you are looking to schedule availability for appointments with individual students (not groups).</p>
<p class="padding2">- Each individual appointment will be 30 minutes in length.</p>
<p class="padding2">- You can schedule a large block of appointments at once for one day. Appointments will be split into 30 minute blocks if the availabilty specified is one hour or greater.</p>
<p class="padding2">- Availability will not be scheduled and an error message will be returned if:</p>
<p class="padding3">- The advisor name provided does not match records.</p>
<p class="padding3">- The time specified is not within the period from 8:00 am through 4:00 pm.</p>
<p class="padding3">- The time specified does not meet the required 30 minute minimum.</p>
</FONT>
<br>
<br>
<br>
<h1><a id="GA"><p class="padding" style="color:black;"><u>Group Appointments</u></p></a></h1>
<br>
<FONT SIZE=3>
<p class="padding2">- Use the <a href="groupPage.php">Group Page</a> if you are looking to schedule availability for appointments with groups of students.</p>
<p class="padding2">- Group appointments can be scheduled with a maximum capacity of either 10 or 5 students, depending on the availability of individual advisors.</p>
<p class="padding3">- For instructions on how to change the capacity of an appointment, look <a href="#CC">here</a>.</p>
<p class="padding2">- Any group appointment can be open to all COEIT students, or specific to a certain major:</p>
<p class="padding3">- computer science (CMSC), computer engineering (CMPE), chemical engineering (ENCH), mechanical engineering (ENME) or engineering (EGNR).</p>
<p class="padding2">- Each group appointment will be 30 minutes in length.</p>
<p class="padding2">- You can schedule a large block of appointments at once for one day. Appointments will be split into 30 minute blocks if the availabilty specified is one hour or greater.</p>
<p class="padding2">- Availability will not be scheduled and an error message will be returned if:</p>
<p class="padding3">- The time specified is not within the period from 8:00 am through 4:00 pm.</p>
<p class="padding3">- The time specified does not meet the required 30 minute minimum.</p>
</FONT>
<br>
<br>
<br>
<br>
<h1><a id="AD"><p class="padding" style="color:black;"><u>Change Advisors</u></p></a></h1>
<br>
<FONT SIZE=3>
<p class="padding2">- Use the <a href="addAdvisor.php">Add Advisor</a> page if you are looking to add a new entry to the list of currently available advisors.</p>
<p class="padding2">- A newly added advisor is immediately available for appointment scheduling.</p>
<p class="padding2">- To view the list of currently available advisors, click <a href="currentAdvisors.php">here</a>.</p>
<p class="padding2">- You have the option of providing an email to be associated with the advisor being added.</p>
<p class="padding2">- An advisor will not be added and an error message will be returned if:</p>
<p class="padding3">- Either the first name or last name of the advisor is left blank.</p>
<p class="padding3">- The name provided matches an advisor already on record.</p>
<br>
<p class="padding2">- To delete an advisor from the currently available list, click <a href="currentAdvisors.php">here</a> and click on the 'Delete' button next to the advisor whom you'd like to remove.</p>
<p class="padding3">- Deleting an advisor will also remove all of that advisor's scheduled availability.</p>

</FONT>
<br>
<br>
<br>
<br>
<h1><a id="SP"><p class="padding" style="color:black;"><u>Printing Schedules</u></p></a></h1>
<br>
<FONT SIZE=3>
<p class="padding2">- Use the <a href="printingPage.php">Printing Page</a> if you are looking to view scheduled availability.</p>
<p class="padding2">- You can print the entire schedule, or you can print the schedule for a particular day, advisor, time, or any combination of the three.</p>
<p class="padding2">- The printed schedule will contain the following information:</p>
<p class="padding3">- The Date, start time and end time for each displayed appointment.</p>
<p class="padding3">- The advisor associated with each individual appointment, or 'Group' for each group appointment.</p>
<p class="padding3">- The major for major specific appointments, or 'ALL' for general appointments.</p>
<p class="padding3">- The capacity and number of students signed up for each appointment, as well as whether or not each appointment is full.</p>
<p class="padding2">- A schedule will not be printed and an error message will be returned if:</p>
<p class="padding3">- 'All' advisors is unchecked and the provided name does not match an advisor on record.</p>
<p class="padding3">- 'All' days is unchecked and there are no appointments scheduled for the provided day given any other constraints.</p>
<p class="padding3">- 'All' times is unchecked and there are no appointments scheduled within the given time range given any other constraints.</p>
</FONT>
<br>
<br>
<br>
<br>
<h1><a id="CC"><p class="padding" style="color:black;"><u>Change or Delete Appointments</u></p></a></h1>
<br>
<FONT SIZE=3>
<p class="padding2">- To delete an appointment: </p>
<p class="padding3">- First: use the <a href="printingPage.php">Printing Page</a> to find the appointment that you are interested in.</p>
<p class="padding3">- Once found, click on the 'Delete' button next to the appointment.</p>
<p class="padding3">- Afterwards, click on the 'Back' button in order to return to your printed schedule.</p>
<br>
<p class="padding2">- To change the maximum capacity of a group appointment:</p>
<p class="padding3">- First: use the <a href="printingPage.php">Printing Page</a> to find the appointment that you are interested in.</p>
<p class="padding3">- Once found, click on the arrow button next to the appointment. The 'up' arrow will increase the capacity to 10, while the 'down' arrow will decrease the capacity to 5.</p>
<p class="padding3">- Afterwards, click on the 'Back' button in order to return to your printed schedule.</p>
<br>
<p class="padding3">** Capacity can only be decreased to 5 if there are no more than 5 students already signed up. **</p>
</FONT>
<br>
<br>
	<center><FORM><INPUT Type="button" class="button go large" VALUE="Back" onClick="history.go(-1);return true;"></FORM></center>
<br>
<br>
</body>
</html>