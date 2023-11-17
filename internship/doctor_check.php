<!DOCTYPE html>
<html>
<head>
	<title>Im_a_doctor</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php include 'lib_css.php'; ?>
	<link rel="stylesheet" href="static/css/im_a_doctor.css">
</head>
<body>
<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

if (!isset($_COOKIE['cookie'])) { //the user hasn't logged in
	exit("Please sign up and login first to gain access.");
}

//use the cookie to check if the logged user is a doctor
if (isset($_COOKIE['cookie']['email'])) {
	$isDoctor = "";
	$email = $_COOKIE['cookie']['email'];
	$query = "SELECT p.AMKA, CASE WHEN d.AMKA IS NULL THEN 'No' ELSE 'Yes' END AS IsDoctor FROM Patient p LEFT JOIN Doctor d ON d.AMKA = p.AMKA WHERE p.Email = '$email'";
	$result=mysqli_query($link,$query);
	while ($myrow=mysqli_fetch_array($result)) {
		$isDoctor = $myrow[1];
	}
	if($isDoctor != "Yes") {
		exit('You are not a Doctor.');
	}
	//redirect to doctor_ok.php
	header("Location: doctor_ok.php");
	exit;
}
?>

<header class="header">
	<div class="header-content">
		<h1>Welcome to YourMed</h1>
		 <h2>Here you can book a medical appointment anytime</h2>
		<h2>Quick and easy, based on your needs!</h2>
	</div>
</header>

<div id="navbar">
	<a  href="home_start.php">Home</a>
	<a class="active" href="doctor_check.php">I'm a doctor</a>
	<a href="javascript:void(0)">Contact</a>
	<a href="javascript:void(0)">FAQs</a>
	<a href="sign_form.php">Sign up</a>
	<a href="login_form.php">Login</a>
</div>

	<script src="static/js/im_a_doctor.js"></script>
</body>
</html>	