<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Sign In</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include('navbar.html') ?>
			<div id="signin">
				<form class="field" action="/process/process_sign_in.php" method="POST">
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
					<div id="account_sign_in_up">
						<p>Don't have an account?</p>
						<a href="sign_up.php">Create an account</a>
					</div>
				</form>	
			</div>
		</div>
		<?php include('footer.html') ?>
	</body>
</html>