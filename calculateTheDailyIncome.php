<?php
require 'doctor.php';

			$sql = "SELECT * FROM visits ";
					$result = $con->query($sql);
					$total=0;


					if ($result->num_rows > 0) {
					    // output data of each row
					   		 $Fees = $visits['Fees'];
					   		$TotalFees = new Int($Fees); //Time of post

							while($row = $result->fetch_assoc()) {
					   		$total = $total + $row["Fees"];
					        
					    }
			        	echo "Total is "+ $total ;


}

?>

