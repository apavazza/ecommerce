<?php include('./php_scripts/sign_in_script.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Sign In</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
			#footer{
          		position: fixed;
          		bottom: 0;
        	}
		</style>
	</head>
	<body>
		<?php include('navbar.html') ?>
			<div id="signin">
				<form class="field" method="POST">
					<h2>Sign in</h2>
					<br>
					<input type="text" name="username" placeholder="Username" >
					<?= $errorUsername ?>
					<br>
					<input type="password" name="password" placeholder="Password" autocomplete="off" >
					<?= $errorPassword ?>
					<input type="checkbox" name="stay-signed-in"> Stay signed in
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