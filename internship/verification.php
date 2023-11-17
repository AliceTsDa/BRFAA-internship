<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
</head>
<body>
	<?php 
		error_reporting( E_ALL );
		ini_set( "display_errors", 1 );

		include 'db.php';

		//Parse the query string from the URL
		$query = $_SERVER['QUERY_STRING'];
		parse_str($query, $params);

		//Get the token and email from the parameters
		$URLemail = isset($_GET['email']) ? $_GET['email'] : '';
		$URLtoken = isset($_GET['token']) ? $_GET['token'] : '';
	
		//Validate and extract the email using regex
		$emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
		preg_match($emailPattern, $URLemail, $matches);
		$URLemail = isset($matches[0]) ? $matches[0] : '';

		//is there a Patient with the email and the token of the URL?
		$temp = 'random';
		$query = "SELECT COUNT(*) FROM Patient WHERE email = '$URLemail' AND verification = '$URLtoken'";
		$result = mysqli_query($link,$query);
		while ($myrow=mysqli_fetch_array($result)) {
				 $temp = $myrow[0];
		}
		if($temp>0){
			//alter the verified into Yes
			$query = "UPDATE Patient SET verified = 'Yes' WHERE email='$URLemail'";
			$result = mysqli_query($link,$query);
			echo "Verification okay. Your account is now confirmed.";
			//a button that redirects to the Login page
			echo "<p>";
			echo 'Click <a href="login_form.php" target="_top">here</a> to Login on your account.';
			echo "</p>";
			exit();
		}
		else {
			exit("There is no such verrified account.");
		}
	?>
</body>
</html>


