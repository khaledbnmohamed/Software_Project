<?php
require 'doctor.php';

		
					$result = mysql_query("SELECT SUM(Fees) AS value_sum FROM visits"); 
					$row = mysql_fetch_assoc($result); 
					$sum = $row['value_sum'];
					Echo "<br";
					Echo "<br";
					Echo "<br";

					Echo "Total Today is" . $sum ;
					$con->close();

?>

