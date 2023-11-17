<?php
	include 'token_validation.php';
?>
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
	<a href="account.php">My account</a>
</div>

<h2>Appointments:</h2>

<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

	$email = $_COOKIE['cookie']['email'];
	//TODO: escape + html_encode +. ...
	
	$query = "SELECT AMKAD, CAST(date_time AS DATE) AS AppointmentDate FROM Appointments WHERE AMKAD = (SELECT AMKA FROM Patient WHERE email = '$email')
	";
	$result=mysqli_query($link,$query);
	?>
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>AMKA</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>

	<?php
	while ($myrow=mysqli_fetch_array($result)) {
		?>
			<tr>
				<td>
					<?php 
						echo($myrow[0]); 
					?>
				</td>
				<td>
					<?php 
						echo($myrow[1]); 
					?>
				</td>
			</tr>
		<?php

		$temp = $myrow[0];
	}
	?>
					</tbody>
				</table>
			</div>
		</div>
	<?php



include 'lib_js.php'; 

?>

</body>
</html>	