<!DOCTYPE html>

<html>

	<head>

		<title>eCommerce - Sign In</title>

		<meta charset="utf-8">

		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>

	<body>

		<?php include('navbar.html') ?>

			<div class="signin">

				<form class="field" action="obrada.php" method="POST">

					<h2>Sign in</h2>

					<br>

					<input type="text" name="username" placeholder="Username" >

					<br>

					<input type="password" name="password" placeholder="Password" autocomplete="off" >

					<input type="checkbox" name=""> Stay signed in

					<a id="forgotpassword" href="forgot_password.php">Forgot my password</a>

					<br>

					<br>

					<br>

					<button type="submit">Sign in</button>

					<br><br><br>

					<p id="createaccount">Don't have an account?</p>

					<a href="sign_up.php" id="createaccount">Create an account</a>

				</form>	

			</div>

		</div>

	</body>

</html>