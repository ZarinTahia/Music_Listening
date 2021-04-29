<?php
	include("config.php");
	include("Account.php");
	include("../Views/Constants.php");

	$account = new Account($con);

	include("../Models/register-handler.php");
	include("../Models/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome!!!</title>

	<link rel="stylesheet" type="text/css" href="../Views/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../Views/js/register.js"></script>
</head>
<body>
<center>
  <div id="particles-js">
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>particlesJS.load('particles-js', 'particles.json', function() {
  console.log('callback - particles.js config loaded');
});</script>
  <?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
  <div id="background">
				<fieldset>
					<br>
				<form id="loginForm" action="register.php" method="POST">
					
<img src="https://cdn.dribbble.com/users/1237300/screenshots/6478927/__-1_1_____.gif" height="250px" width="350px">
					<h2>Login</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
<br><br>
						<label for="loginUsername">UserName</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. ZarinTahiaHossain" required>
					</p>
					<p><br>
						<label for="loginPassword">Password</label>
					<input id="loginPassword" name="loginPassword" type="password" placeholder="e.g. 18101184Zarin" required>
				</p>

<br>
    <input type="submit" name="loginButton" onmouseover="this.style.background='#DB5D53';" onmouseout="this.style.background='#DB6574';" value="Login"/><br>
				<div class="hasAccountText">
					<span id="hideLogin">Don't have an account yet? Register here.</span>
				</div>
					
				</form>
				


		        <form id="registerForm" action="register.php" method="POST">
					<h2>Create Account</h2><br><br>
					<p> 
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
		                 <?php echo $account->getError(Constants::$usernameTaken); ?>

						<label for="username">Prefered UserName</label>
						<input id="username" name="username" type="text" placeholder="e.g. ZarinTahiaHossain" required>
					</p>
		            <p>
		            	<?php echo $account->getError(Constants::$firstNameCharacters); ?>

						<label for="FirstName">First Name</label>
						<input id="FirstName" name="FirstName" type="text" placeholder="e.g. Zarin Tahia" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="LastName">LastName</label>
						<input id="LastName" name="LastName" type="text" placeholder="e.g. Hossain" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>

						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. zarin.tahia.hossain@g.bracu.ac.bd" required>
					</p>

					<p>
						<label for="Password">Password</label>
					<input id="Password" name="Password" type="password" placeholder="e.g. 18101184Zarin" required>
				    </p>




					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>

						<label for="confirmPassword">Confirm Password</label>
					    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="e.g. 18101184Zarin" required>
				    </p>
<br>
    <input type="submit" name="registerButton" onmouseover="this.style.background='#DB5D53';" onmouseout="this.style.background='#DB6574';" value="Register"/><br>
				<div class="hasAccountText">
					<span id="hideRegister">Already have an account? Login here.</span>
				</div>

</fieldset>

					
				</form>

            </div>

   

		</div>
	</div>
</center>
</body>
</html>