<!DOCTYPE html>
<html>
  <head>
    <title>Account</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php include 'lib_css.php'; ?>
  <link rel="stylesheet" href="static/css/account.css">
  </head>
  <body>
<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
	<a href="home_logged.php">Home</a>
	<a href="doctor_check.php">I'm a doctor</a>
	<a href="javascript:void(0)">Contact</a>
	<a href="javascript:void(0)">FAQs</a>
	<a class="active" href="account.php">My account</a>
</div>

<?php 
if(!isset($_COOKIE['cookie'])) {
  echo "Cookie named '" . $cookie . "' is not set!";
  //error message
} else {
  echo $_COOKIE['cookie']['email'];
}

include 'lib_js.php'; 	
?>
	<script src="static/js/account.js"></script>
</body>
</html>	