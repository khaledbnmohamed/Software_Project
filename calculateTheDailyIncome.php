<?php
require 'doctor.php';

			$sql = "SELECT Fees FROM visits ";
					$result = $con->query($sql);
					$total=0;


					if ($result->num_rows > 0) {
					    // output data of each row
					   
							while($row = $result->fetch_assoc()) {
					   		$total = $total + $row["Fees"];
					        
					    }
			        	echo "Total is "+ $total ;


}

?>

