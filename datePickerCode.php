<!--__________________________________________________-->

<!-- THIS IS THE CODE IN HTML TO MAKE THE DATE PICKER -->

<!--__________________________________________________


-->

<?php

echo "<!doctype html>"; 
echo "<html lang=\"en\">"; 
 
echo "  <meta charset=\"utf-8\">"; 
echo "  <title>jQuery UI Datepicker - Default functionality</title>"; 
echo "  <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">"; 
echo "  <script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>"; 
echo "  <script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>"; 
echo "  <script src=\"http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js\"></script>";
echo "  <link rel=\"stylesheet\" href=\"/resources/demos/style.css\">";  
echo "<!--   <input type='text' id='txtDate' /> -->"; 
echo "  <input type=\"text\" name=\"date\" id=\"date\" readonly=\"readonly\" size=\"12\" />"; 
echo "  <script>"; 
echo "            $('#date').datepicker({ dateFormat: \"yy-mm-dd\" }).val();";
echo "	var availableDates = [\"23-3-2015\",\"24-3-2015\",\"25-3-2015\",\"26-3-2015\",\"27-3-2015\",\"30-3-2015\",\"31-3-2015\",
\"1-4-2015\",\"2-4-2015\",\"3-4-2015\",\"6-4-2015\",\"7-4-2015\",\"8-4-2015\",\"9-4-2015\",\"10-4-2015\",\"13-4-2015\",\"14-4-2015\"
,\"15-4-2015\",\"16-4-2015\",\"17-4-2015\",\"20-4-2015\",\"21-4-2015\",\"22-4-2015\",\"23-4-2015\",\"24-4-2015\",\"27-4-2015\"
,\"28-4-2015\",\"29-4-2015\",\"30-4-2015\",\"1-5-2015\"];";

echo "	function available(date) {"; 
echo "	  dmy = date.getDate() + \"-\" + (date.getMonth()+1) + \"-\" + date.getFullYear();"; 
echo "	  if ($.inArray(dmy, availableDates) != -1) {"; 
echo "	    return [true, \"\",\"Available\"];"; 
echo "	  } else {"; 
echo "	    return [false,\"\",\"unavailable\"];"; 
echo "	  }"; 
echo "	}"; 
echo "		$('#date').multiDatesPicker({ beforeShowDay: available });"; 
echo ""; 
echo "  </script>"; 




echo("")
?>
