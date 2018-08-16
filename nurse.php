<?php
require 'config/config.php';
require 'includes/form_handlers/login_handler.php';

?>

<html>
<head>
	<title>Clinic User</title>

	<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>


	<!-- CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
	<link rel="shortcut icon" href="includes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="includes/favicon.ico" type="image/x-icon">

<body>


<div class="wrapper">

		<div class="login_box">

			<div class="login_header">
				
					<br>
							<h1>Today's Appointments</h1>
						<br>
						
			</div>
			<br>
			<div id="first">

				<form action="Add_Patient.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Address" value="<?php 
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					} 
					?>" required>
					<br>
					
					<?php 
					$user_id  = "";
					$user_id = $_SESSION['user_id'];

					$sql = "SELECT * FROM visits ";

					$result = $con->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					   

					    	while($row = $result->fetch_assoc()) {
					    	$my_id = $row["vPatient_id"];
					    	$sql2 = "SELECT first_name, last_name FROM patient Where patient_id = '$my_id' ";
					 		$result2 = $con->query($sql2);
					    	$row2 = $result2->fetch_assoc();
					    	Echo "<html>";
					        echo "<h2 style=color:Black;> id: " . $row["visit_id"]. "  Patient ID: " . $row["vPatient_id"]. " Fees = " . $row["Fees"]. " -Date and Time : " . $row["Visit_Date_Time"]. "Patient First name : " . $row2["first_name"]." Last Name: ". $row2["last_name"]. "</h2> <br>";
					        


					    }
					} else {
					    echo "0 results";
					}
					$con->close();
					?>
					<input type="submit" name="register_button" value="Add New Patient">


				</form>

			</div>


		</div>

	</div>


</body>
</html>

