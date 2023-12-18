<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Forgot Password</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<form class="field" action="/process/process_forgot_password.php" method="POST">
				<h2>Forgot Password</h2>
				<br>
				<input type="email" name="email" placeholder="Email" autocomplete="off" >
				<br>
				<br>
				<br>
				<button type="submit">Reset password</button>
			</form>	
		</div>
		<?php include('footer.html') ?>
	</body>
</html>