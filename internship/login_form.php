<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
    <?php include 'lib_css.php'; ?>
	<link rel="stylesheet" href="static/css/login_form.css">
</head>
<body>
    <div class="center-container">
        <h2>Welcome to YourMed</h2>
        <h3>Please Log in</h3>
        <form action="login.php" method="POST">
            <table class="w-100">
                <tbody>	  
                    <tr>  
                        <td class="text-end"> Email: <br>
                        </td>
                        <td> <input type="email" name="email" required><br>
                        </td>
                    </tr> 

                    <tr>
                        <td class="text-end"> Password: <br>
                        </td>
                        <td> <input type="password" name="password" required><br>
                        </td>
                    </tr>  

                    <tr>
                        <td colspan="2"> <!-- colspan to make the input span two columns -->
                            <input type="submit" value="Submit">
                        </td>
                    </tr>  
                </tbody>
            </table>
        </form>
        <h4 class="text-center">You don't have an account? Click <a href="sign_form.php" target="_top">here</a> to Sign up.</h4>
    </div>
	<?php include 'lib_js.php'; ?>
</body>
</html>