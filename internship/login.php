<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';
	
$email="sign_flag"; //for when it's redirected from the sign up page

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Sanitize and bind parameters to the prepared statement
	$email="";
	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$email = trim($email);
					$email = html_entity_decode($email);
			$email = strip_tags($email);
			$email = mysqli_real_escape_string($link, $email);
		// Remove all illegal characters from email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		// Validate e-mail
		if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
			echo("$email is not a valid email address.");
			exit();
		}	
	}
	$password="";
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
		$password = trim($password);
		$password = html_entity_decode($password);
		$password = strip_tags($password);
		$password = mysqli_real_escape_string($link, $password);
	}
}

//is this email on the database?
$temp = 'random';
$query1 = "SELECT 'Yes' AS result FROM Patient WHERE email='$email'";
$result1=mysqli_query($link,$query1);
while ($myrow=mysqli_fetch_array($result1)) {
	$temp = $myrow[0];
}
if ($temp !='Yes'){
	exit("There is no account with that email.");
}
else {
	//check if the verified is Yes
	$temp = 'random';
	$query = "SELECT verified FROM Patient WHERE email='$email'";
	$result=mysqli_query($link,$query);
	while ($myrow=mysqli_fetch_array($result)) {
		$temp = $myrow[0];
	}
	if ($temp !='Yes'){
		exit("This account has not been verified. Please check your email if you want to continue.");
	}
	else {
		$query2 = "SELECT hashedPassword FROM Patient WHERE email='$email'";
		$result2=mysqli_query($link,$query2);
		while ($myrow=mysqli_fetch_array($result2)) {
			$temp = $myrow[0];
		}
		if (password_verify($password, $temp)) { //check the password
			$TOKEN=uniqid();
			// update database with the new token
			$query = "UPDATE Patient SET verification = '$TOKEN' WHERE email = '$email'";
			$result = mysqli_query($link,$query);

			//store cookie
			setcookie ("cookie[email]", $email, time() + (86400 * 30));
			setcookie ("cookie[TOKEN]", $TOKEN, time() + (86400 * 30));
			// Redirect to another page
			header("Location: home_logged.php");
			exit;
		} else {
			exit("Password is incorrect.");
		}
	}
}
?>