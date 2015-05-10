<!--__________________________________________________-->

<!-- THIS IS THE CODE IN HTML TO MAKE THE DATE PICKER -->

<!--__________________________________________________


some fo the code has been taken from here
http://stackoverflow.com/questions/7709320/jquery-ui-datepicker-enable-only-specific-days-in-array

-->

<?php
echo "</body>\n"; 
echo "</html>\n"; 
echo "<!doctype html>\n"; 
echo "<html lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <meta charset=\"utf-8\">\n"; 
echo "  <title>jQuery UI Datepicker - Default functionality</title>\n"; 
echo "  <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">\n"; 
echo "  <script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>\n"; 
echo "  <script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>\n"; 
echo "  <link rel=\"stylesheet\" href=\"/resources/demos/style.css\">\n"; 
echo "\n"; 
echo "<!--   <input type='text' id='txtDate' /> -->\n"; 
echo "  <input type=\"text\" name=\"date\" id=\"date\" readonly=\"readonly\" size=\"12\" />\n"; 
echo "\n"; 
echo "  <script>\n"; 
echo "\n"; 
echo "\n"; 
echo "\n"; 
echo "	var availableDates = [\"9-5-2015\",\"14-5-2015\",\"15-5-2015\"];\n"; 
echo "\n"; 
echo "	function available(date) {\n"; 
echo "	  dmy = date.getDate() + \"-\" + (date.getMonth()+1) + \"-\" + date.getFullYear();\n"; 
echo "	  if ($.inArray(dmy, availableDates) != -1) {\n"; 
echo "	    return [true, \"\",\"Available\"];\n"; 
echo "	  } else {\n"; 
echo "	    return [false,\"\",\"unAvailable\"];\n"; 
echo "	  }\n"; 
echo "	}\n"; 
echo "		$('#date').datepicker({ beforeShowDay: available });\n"; 
echo "\n"; 
echo "  </script>\n"; 
echo "</head>\n"; 
echo "<body>\n"; 
echo " \n"; 
echo "</body>\n"; 
echo "</html> \n"; 
echo "\n"; 

echo("")
?>
