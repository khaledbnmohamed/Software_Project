<?php
//Declaring variables to prevent errors
$first_name = ""; // name
$last_name = ""; // name
$phone = ""; //email
$gender = ""; //password
$bdate = ""; //password
$MHistory = ""; //password

$error_array = array(); //Holds error messages
$authentication ="";
if(isset($_POST['register_button'])){
	//Registration form values
	// name
	$first_name = strip_tags($_POST['reg_fname']); //Remove html tags
	$first_name = str_replace(' ', '', $first_name); //remove spaces
	$first_name = ucfirst(strtolower($first_name)); //Uppercase first letter
	$_SESSION['reg_fname'] = $first_name; //Stores first name into session variable

	$last_name = strip_tags($_POST['reg_lname']); //Remove html tags
	$last_name = str_replace(' ', '', $last_name); //remove spaces
	$last_name = ucfirst(strtolower($last_name)); //Uppercase first letter
	$_SESSION['reg_lname'] = $last_name; //Stores first name into session variable
	//email
	$phone = strip_tags($_POST['phone']); //Remove html tags
	$phone = str_replace(' ', '', $phone); //remove spaces
	$phone = ucfirst(strtolower($phone)); //Uppercase first letter
	$_SESSION['phone'] = $phone; //Stores email into session variable
	//Password
	$gender = strip_tags($_POST['gender']); //Remove html tags
	$gender =($_POST['gender']);

	$bdate = strip_tags($_POST['bdate']); //Remove html tags
	$bdate =($_POST['bdate']);

	$MHistory = strip_tags($_POST['MHistory']); //Remove html tags
	$MHistory =($_POST['MHistory']);



	$date = date("Y-m-d"); //Current date
		//Check if email is in valid format 
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT phone FROM patient WHERE phone='$phone'");
			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);
			if($num_rows) {
				array_push($error_array, "Patient already in use<br>");
			}
		}
	
	if(strlen($first_name) > 25 || strlen($first_name) < 2) {
		array_push($error_array, "Patient first name must be between 2 and 25 characters<br>");
	}
	
	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database
		$query = mysqli_query($con, "INSERT INTO patient VALUES ('', '$first_name', '$last_name',$phone','$gender','$bdate','$MHistory')");
		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_email'] = "";
}
	
}
?>