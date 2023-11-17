<!DOCTYPE html>
<html>
<head>
	<title>Sign Form</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'lib_css.php'; ?>
	<link rel="stylesheet" href="static/css/sign_form.css">
</head>
<body>
    <div class="center-container">
        <h2 class="text-center">Welcome to YourMed</h2>
        <h3 class="text-center">Please Sign up</h3>
		<form action="sign.php" method="POST" id="signup_form">						   
            <table class="w-100" >
			<tbody>	  
			<tr>
				<td class="text-end"> Name: <br>
				</td>
				<td> <input type="text" name="name" required><br>
				</td>
			</tr>

			<tr>
				<td class="text-end"> Surname: <br>
				</td>
				<td> <input type="text" name="surname" required><br>
				</td>
			</tr> 

			<tr>  
				<td class="text-end"> Email: <br>
				</td>
				<td> <input type="email" id="email" name="email" required><br>
			</tr> 
			
			<tr>
				<td class="text-end"> Please repeat your email: <br>
				</td>
				<td> <input type="email" id="remail" name="remail" required> <br>
				</td>
			</tr> 	

			<tr>
				<td class="text-end"> Password: <br>
				</td>
				<td> <input type="password" id="password" name="password" required><br>
				</td>
			</tr>  

			<tr>
				<td class="text-end"> Please repeat your password: <br>
				</td>
				<td> <input type="password" id="rpassword" name="rpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required><br>
				</td>
			</tr>

			<tr>
				<td class="text-end"> Mobile: <br>
				</td>
				<td> <input type="text" name="mobile" required><br>
				</td>
			</tr> 

			<tr>
				<td class="text-end"> Landline: <br>
				</td>
				<td> <input type="text" name="landline" required><br>
				</td>
			</tr> 

			<tr>
				<td class="text-end"> AMKA: <br>
				</td>
				<td> <input id="amka" type="text" name="amka" required><br>
				</td>
			</tr> 

			<tr>
				<td class="text-end" for="dob"> Date of Birth: <br>
				</td>
				<td> <input type="text" id="datepicker" name="dob"><br>
				</td>
			</tr> 

			 <tr>
				<td class="text-end"> Gender: <br>
				</td>
				<td><input type="radio" name = "gender" value="Female"> Female
					<input type="radio" name = "gender" value="Male"> Male <br>
				</td>
			</tr>  

			<tr>
				<td class="text-end"> Insurance: <br>
				</td>
				<td><input type="radio" name = "insurance" value="Ika"> IKA
					<input type="radio" name = "insurance" value="Efka"> EFKA
					<input type="radio" name = "insurance" value="Eopyy"> EOPYY <br>
				</td>
			</tr>
			
			<tr>
				<td class="text-end"> I'm a doctor:<br></td>
				<td>
					<input type="radio" name="doctor" value="Yes" id="doctorYes">
					<label for="doctorYes">Yes</label>
					<input type="radio" name="doctor" value="No" id="doctorNo">
					<label for="doctorNo">No</label> <br>	
				</td>
			</tr>

			<tr id="additionalFieldContainer" style="display: none;">
				<td colspan="2">
					<label for="additionalField">Supported insurance(s):</label>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="IKA" name="hasIKA">
						<label class="form-check-label" for="IKA">IKA</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="EFKA" name="hasEFKA" checked>
						<label class="form-check-label" for="EFKA">EFKA</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="EOPYY" name="hasEOPYY" checked>
						<label class="form-check-label" for="EOPYY">EOPYY</label>
					</div>
				</td>	
			</tr>
			
			<tr id="additionalInputFieldContainer" style="display: none;">
				<td colspan="2">
					
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
				</td>
			</tr>

			<tr id="areaContainer" style="display: none;">
				<td colspan="2">
				<label for="Area" class="label form-label">Area</label>
				<select class="form-select" placeholder="Please select an Area" name="Area" id="Area" required>
					<option value="">Please select an Area</option>
					<option value="Koukaki">Koukaki</option>
					<option value="Pagkrati">Pagkrati</option>
					<option value="Anw Liosia">Anw Liosia</option>
				</select>
				</td>	
			</tr>

  			<tr>
				<td class="text-end"> <br>
				</td>
				<td> <input type="submit" value="Submit"><br>
				</td>
			</tr>  

			</tbody>
			</table>
			</form>
	
		<div id="message">
		  <h3>Password must contain the following:</h3>
		  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
		  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
		  <p id="number" class="invalid">A <b>number</b></p>
		  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>
        <h4>Already have an account? Click <a href="login_form.php" target="_top">here</a> to Login.</h4>
    </div>
	<?php include 'lib_js.php'; ?>
	<script src="static/js/sign_form.js"></script>
</body>
</html>