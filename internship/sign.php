<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and bind parameters to the prepared statement
	$name="";
	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = trim($name);
		$name = html_entity_decode($name);
		$name = strip_tags($name);
		$name = mysqli_real_escape_string($link, $name);
	}
	$surname="";
	if(isset($_POST['surname'])) {
		$surname = $_POST['surname'];
		$surname = trim($surname);
		$surname = html_entity_decode($surname);
		$surname = strip_tags($surname);
		$surname = mysqli_real_escape_string($link, $surname);
	}
	$email="";
	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$email = trim($email);
		$email = html_entity_decode($email);
		$email = strip_tags($email);
		$email = mysqli_real_escape_string($link, $email);
	}
	$remail="";
	if(isset($_POST['remail'])) {
		$remail = $_POST['remail'];
		$remail = trim($remail);
		$remail = html_entity_decode($remail);
		$remail = strip_tags($remail);
		$remail = mysqli_real_escape_string($link, $remail);
	}
	//is the repeated email the same?
	if (strcmp($email, $remail) != 0){
		echo 'Emails do NOT match.';
		exit();
	}	
	// Remove all illegal characters from email
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// Validate e-mail
	if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo("$email is not a valid email address.");
		exit();
	}

	$password="";
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
		$password = trim($password);
		$password = html_entity_decode($password);
		$password = strip_tags($password);
		$password = mysqli_real_escape_string($link, $password);
	}
    $rpassword="";
	if(isset($_POST['rpassword'])) {
		$rpassword = $_POST['rpassword'];
		$rpassword = trim($rpassword);
		$rpassword = html_entity_decode($rpassword);
		$rpassword = strip_tags($rpassword);
		$rpassword = mysqli_real_escape_string($link, $rpassword);
	}
	//is the repeated password the same?
	if (strcmp($password, $rpassword) == 0){
		// Hash the password and add salt
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	}
	else {
		echo 'Passwords do NOT match.';
		exit();
	}
	$mobile="";
	if(isset($_POST['mobile'])) {
		$mobile = $_POST['mobile'];
		$mobile = trim($mobile);
		$mobile = html_entity_decode($mobile);
		$mobile = strip_tags($mobile);
		$mobile = mysqli_real_escape_string($link, $mobile);
	}
	$landline="";
	if(isset($_POST['landline'])) {
		$landline = $_POST['landline'];
		$landline = trim($landline);
		$landline = html_entity_decode($landline);
		$landline = strip_tags($landline);
		$landline = mysqli_real_escape_string($link, $landline);
	}
	$amka="";
	if(isset($_POST['amka'])) {
		$amka = $_POST['amka'];
		$amka = trim($amka);
		$amka = html_entity_decode($amka);
		$amka = strip_tags($amka);
		$amka = mysqli_real_escape_string($link, $amka);
	}
	$dob="";
	if(isset($_POST['dob'])) {
		$dob = $_POST['dob'];
		$dob = trim($dob);
		$dob = html_entity_decode($dob);
		$dob = strip_tags($dob);
		$dob = mysqli_real_escape_string($link, $dob);
	}
	$gender="";
	if(isset($_POST['gender'])) {
		$gender = $_POST['gender'];
		$gender = trim($gender);
		$gender = html_entity_decode($gender);
		$gender = strip_tags($gender);
		$gender = mysqli_real_escape_string($link, $gender);
	}
	$insurance="";
	if(isset($_POST['insurance'])) {
		$insurance = $_POST['insurance'];
		$insurance = trim($insurance);
		$insurance = html_entity_decode($insurance);
		$insurance = strip_tags($insurance);
		$insurance = mysqli_real_escape_string($link, $insurance);
	}
	//check if the user is a doctor
	$doctor="";
	if(isset($_POST['doctor'])) {
		$doctor = $_POST['doctor'];
		$doctor = trim($doctor);
		$doctor = html_entity_decode($doctor);
		$doctor = strip_tags($doctor);
		$doctor = mysqli_real_escape_string($link, $doctor);
	}
	if ($doctor=="Yes"){
		$specialization="";
		if(isset($_POST['Specialization'])) {
			$specialization = $_POST['Specialization'];
			$specialization = trim($specialization);
			$specialization = html_entity_decode($specialization);
			$specialization = strip_tags($specialization);
			$specialization = mysqli_real_escape_string($link, $specialization);
		}
		$area="";
		if(isset($_POST['Area'])) {
			$area = $_POST['Area'];
			$area = trim($area);
			$area = html_entity_decode($area);
			$area = strip_tags($area);
			$area = mysqli_real_escape_string($link, $area);
		}
		$hasEFKA = false;
		$hasIKA = false;
		$hasEOPYY = false;
		if(isset($_POST['hasEFKA'])) {
			$hasEFKA = true;
		}
		if(isset($_POST['hasIKA'])) {
			$hasIKA = true;
		}
		if(isset($_POST['hasEOPYY'])) {
			$hasEOPYY = true;
		}
		echo("insurance values:");
		echo($hasEFKA);
		echo($hasIKA);
		echo($hasEOPYY);
	}
} else {
	exit('Only POST supported!');
}

$temp = 'random';
$query1 = "SELECT 'Yes' AS result FROM Patient WHERE AMKA=$amka";
$result1 = mysqli_query($link,$query1);

while ($myrow=mysqli_fetch_array($result1)) {
 	$temp = $myrow[0];
}

if ($temp =='Yes'){
	exit("There is an account with that AMKA already.");
}
else {
	$temp = 'random';
	$query2 = "SELECT 'Yes' AS result FROM Patient WHERE email='$email'";
	$result2 = mysqli_query($link,$query2);

	while ($myrow=mysqli_fetch_array($result2)) {
		 $temp = $myrow[0];
	}

	if ($temp =='Yes'){
		exit("There is an account with that email already.");
	}
	else {
		echo ('Creating account...');
		$VERIFICATION_TOKEN=uniqid();
		$query3 = "INSERT INTO Patient (AMKA, name, surname, email, hashedPassword, mobile, landline, date_of_birth, gender, verification, verified, insurance) VALUES ($amka, '$name', '$surname', '$email', '$hashedPassword', $mobile, $landline, '$dob', '$gender', '$VERIFICATION_TOKEN', 'No', '$insurance')";
		echo($query3);
		$result3=mysqli_query($link,$query3);
		if (!$result3) {
			echo('DB query error');
		}
		echo($result3);
		echo ('Created account');
		#if the user is a doctor, load the extra data on the db
		if ($doctor=="Yes"){
			echo('Creating doctor');
			$query4 = "INSERT INTO Doctor (AMKA, specialization, area) VALUES ('$amka','$specialization', '$area')";
			$result4=mysqli_query($link,$query4);
			if(!$result4) {
				echo ($query4);
			}
			if ($hasIKA) {
				$query5 = "INSERT INTO Doctor_insurance (AMKA, insurance) VALUES ('$amka', 'IKA')";
				$result5=mysqli_query($link,$query5);
				if(!$result5) {
					echo ($query5);
				}
			}
			if ($hasEFKA) {
				$query5 = "INSERT INTO Doctor_insurance (AMKA, insurance) VALUES ('$amka', 'EFKA')";
				$result5=mysqli_query($link,$query5);
				if(!$result5) {
					echo ($query5);
				}
			}
			if ($hasEOPYY) {
				$query5 = "INSERT INTO Doctor_insurance (AMKA, insurance) VALUES ('$amka', 'EOPYY')";
				$result5=mysqli_query($link,$query5);
				if(!$result5) {
					echo ($query5);
				}
			}

		}
		
// 		$identifier_sign = $_POST['email'];
// 		$link = "https://192.168.32.60/~throubitsa/verification.php?email=" . urlencode($email) . "&token=" . urlencode($VERIFICATION_TOKEN);
// 		$subject = "Account confirmation";
// 		$message = "<html>
// <head>
//     <title>$subject</title>
// </head>
// <body>\n";
// 		$message .=  "<p>Thank you for joining YourMed.</p>
// 		<p>We would like to confirm that your account was created successfully. To verify your email and access your account, please click this <a href = '$link'>link</a></p>\n";
// 		$message .=  "</body>
// </html>";																														
// 		$headers = 'From: YourMed@example.com' . "\r\n" .                                             
// 				 'Reply-To: YourMed@example.com' . "\r\n" .
// 				 'X-Mailer: PHP/' . phpversion(). "\r\n";
// 		$headers .= "MIME-Version: 1.0" . "\r\n";
// 		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

// 		if (mail($email, $subject, $message, $headers)) {
// 			echo 'Please check your email for the confirmation link.';
// 		}
// 		else {
// 			echo 'Failed to send verification email.';
// 		}
	
		echo 'Please check your email for the confirmation Link';
	}
}
?>
