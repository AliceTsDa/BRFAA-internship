<!DOCTYPE html>
<html>
<head>
	<title>Home_start</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'lib_css.php'; ?>
	<link rel="stylesheet" href="static/css/home_start.css">
	<link rel="stylesheet" href="static/css/progressbar.css">
</head>
<body>
<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

//use the cookie to check if the user is logged in
if (isset($_COOKIE['cookie'])) { //do you have a cookie?
	//the ONLY way to have a cookie is if you're logged in
	//redirect to home_logged.php
	header("Location: home_logged.php");
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
	<a class="active" href="home_start.php">Home</a>
	<a href="doctor_check.php">I'm a doctor</a>
	<a href="javascript:void(0)">Contact</a>
	<a href="javascript:void(0)">FAQs</a>
	<a href="sign_form.php">Sign up</a>
	<a href="login_form.php">Login</a>
</div>

<br>
<h1>Find your Doctor:</h1>


<form action="home_start.php" method="POST">
<div class="container">
	<div class="form w-75">

		<div class="progressbar">
					<div class="progress" id="progress"></div>
					
					<div class="progress-step progress-step-active" data-title="Specialization" data-target="0"></div>
					<div class="progress-step" data-title="Insurance" data-target="1"></div>
					<div class="progress-step" data-title="Date" data-target="2"></div>
		</div>
		<div class="form-step form-step-active">
			<label for="Speciality" class="label form-label">Specialization</label>
			<select class="form-select" placeholder="Please select a Specialization" name="Specialization" id="Specialization" required>
				<option value="">Please select a Specialization</option>
				<option value="Cardiologist">Cardiologist</option>
				<option value="Pathologist">Pathologist</option>
				<option value="Neurologist">Neurologist</option>
				<option value="Psychiatrist">Psychiatrist</option>
				<option value="Dermatologist">Dermatologist</option>
				<option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
				<option value="Gynecologist">Gynecologist</option>
				<option value="Pediatrician">Pediatrician</option>
				<option value="Ophthalmologist">Ophthalmologist</option>
				<option value="Urologist">Urologist</option>
				<option value="Otolaryngologist">Otolaryngologist</option>
				<option value="Gastroenterologist">Gastroenterologist</option>
				<option value="Endocrinologist">Endocrinologist</option>
				<option value="Rheumatologist">Rheumatologist</option>
				<option value="Pulmonologist">Pulmonologist</option>
			</select>
			<button type="button" class="btn-next">Next</button>
		</div>
		<div class="form-step form-step">
			<label for="Speciality" class="label form-label">Insurance</label>
			<select class="form-select" placeholder="Please select a Insurance" name="Insurance" id="Insurance" required>
				<option value="">Please select an Insurance</option>
				<option value="IKA">IKA</option>
				<option value="EOPYY">EOPYY</option>
				<option value="EFKA">EFKA</option>
			</select>
			<button type="button" class="btn-next">Next</button>

		</div>
		<div class="form-step form-step">
			<label for="date" class="label form-label">Appointment Date</label>
			<input type="date" name="date" id="date" required>
			<button type="submit">Search</button>
		</div>
	</div>
</div>
</form>

<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$insurance="";
	if(isset($_POST['Insurance'])) {
		$insurance = $_POST['Insurance'];
		$insurance = trim($insurance);
		$insurance = html_entity_decode($insurance);
		$insurance = strip_tags($insurance);
		$insurance = mysqli_real_escape_string($link, $insurance);
	}
	$specialization="";
	if(isset($_POST['Specialization'])) {
		$specialization = $_POST['Specialization'];
		$specialization = trim($specialization);
		$specialization = html_entity_decode($specialization);
		$specialization = strip_tags($specialization);
		$specialization = mysqli_real_escape_string($link, $specialization);
	}
	$date="";
	if(isset($_POST['date'])) {
		$date = $_POST['date'];
		$date = trim($date);
		$date = html_entity_decode($date);
		$date = strip_tags($date);
		$date = mysqli_real_escape_string($link, $date);
	}
	$query = " SELECT d.AMKA, p.name, p.surname FROM Doctor d JOIN Patient p ON d.AMKA = p.AMKA JOIN Doctor_insurance di ON di.AMKA = d.AMKA LEFT JOIN Appointments app ON app.AMKAD = d.AMKA AND CAST(app.date_time AS DATE) = '$date' WHERE di.insurance = '$insurance' AND d.specialization = '$specialization' AND app.AMKAD IS NULL;";
	$result=mysqli_query($link,$query);
	?>
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>AMKA</th>
							<th>Name</th>
							<th>Surname</th>
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
				<td>
					<?php 
						echo($myrow[2]); 
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
}

include 'lib_js.php'; 

?>

	<?php include 'lib_js.php'; ?>
	<script src="static/js/progressbar.js"></script>
	<script src="static/js/home_start.js"></script>

</body>
</html>	