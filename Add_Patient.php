<?php  
require 'config/config.php';
require 'includes/form_handlers/Patient_Register_Handler.php';
?>

<head>
	<title>Adding New Patient</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>


	<link rel="shortcut icon" href="includes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="includes/favicon.ico" type="image/x-icon">

</head>
<body>
<div class="wrapper">

		<div class="login_box">

		
			<br>
		

			<div id="first">

				<form action="Patient_Register_Handler.php" method="POST">
					<input type="text" name="reg_fname" placeholder="Patient Name" value="<?php 
					if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					} 
					?>" required>
					<br>

					<?php if(in_array("Patient first name must be between 2 and 25 characters<br>", $error_array)) echo "Patient Last name must be between 2 and 25 characters<br>"; ?>
					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
					if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Patient Last name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>

				
				

					<input type="number" name="phone" placeholder="phone" value="<?php 
					if(isset($_SESSION['phone'])) {
						echo $_SESSION['phone'];
					} 
					?>" required>
					<br>

					<input type="text" name="gender" placeholder="Gender" value="<?php 
					if(isset($_SESSION['gender'])) {
						echo $_SESSION['gender'];
					} 
					?>" required>
					<br>

					<input type="date" name="bdate" placeholder="Birth Date" value="<?php 
					if(isset($_SESSION['bdate'])) {
						echo $_SESSION['bdate'];
					} 
					?>" required>
					<br>
					<input type="text" name="MHistory" placeholder="Medical Historye" value="<?php 
					if(isset($_SESSION['MHistory'])) {
						echo $_SESSION['MHistory'];
					} 
					?>" required>
					<br>
			
			
					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
				</form>
			</div>

		</div>

	</div>


</body>
</html>