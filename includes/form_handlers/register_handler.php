<?php
//Declaring variables to prevent errors
$first_name = ""; // name
$email = ""; //email
$password = ""; //password
$error_array = array(); //Holds error messages
$authentication ="";
if(isset($_POST['register_button'])){
	//Registration form values
	// name
	$first_name = strip_tags($_POST['reg_fname']); //Remove html tags
	$first_name = str_replace(' ', '', $first_name); //remove spaces
	$first_name = ucfirst(strtolower($first_name)); //Uppercase first letter
	$_SESSION['reg_fname'] = $first_name; //Stores first name into session variable
	//email
	$email = strip_tags($_POST['reg_email']); //Remove html tags
	$email = str_replace(' ', '', $email); //remove spaces
	$email = ucfirst(strtolower($email)); //Uppercase first letter
	$_SESSION['reg_email'] = $email; //Stores email into session variable
	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //Remove html tags
	$reg_Authentication =($_POST['reg_Authentication']);
	$date = date("Y-m-d"); //Current date
		//Check if email is in valid format 
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT email FROM user WHERE email='$email'");
			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);
			if($num_rows) {
				array_push($error_array, "Email already in use<br>");
			}
		}
	
	if(strlen($first_name) > 25 || strlen($first_name) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}
	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}
	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database
		$query = mysqli_query($con, "INSERT INTO user VALUES ('', '$first_name', '$email', '$password','$reg_Authentication','','','100','3000')");
		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_email'] = "";
}
	
}
?>