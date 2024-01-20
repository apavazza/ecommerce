<?php include('./php_scripts/sign_up_script.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Sign Up</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include('navbar.html') ?>
		<div id="sign_up">
			<div class="content">
				<form class="field" method="POST">
					<h2>Sign up</h2>
					<label>First Name</label>
					<input type="text" name="firstname">
					<?= $errorFirstName ?>
					<label>Last Name</label>
					<input type="text" name="lastname">
					<?= $errorLastName ?>
					<label>Username</label>
					<input type="text" name="username">
					<?= $errorUsername ?>
					<label>Password</label>
					<input type="password" name="password">
					<?= $errorPassword ?>
					<label>Repeat Password</label>
					<input type="password" name="repeatpassword">
					<?= $errorRepeatPassword ?>
					<label>Email</label>
					<input type="email" name="email">
					<?= $errorEmail ?>
					<input type="checkbox" name="checkbox" required> I accept the <a href="terms.html">terms and conditions</a>.
					<?= $errorCheckbox ?>
					<br>
					<br>
					<button type="submit">Register</button>
					<br><br><br>
					<div id="account_sign_in_up">
						<p>Already have an account?</p>
						<a href="sign_in.php">Sign in</a>
					</div>
				</form>
			</div>
		</div>
		<?php include('footer.html') ?>
	</body>
</html>