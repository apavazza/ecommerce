<?php
	$errorFirstName = "";
	$errorLastName = "";
	$errorUsername = "";
	$errorPassword = "";
	$errorRepeatPassword = "";
	$errorEmail = "";
	$errorCheckbox = "";

	function checkFirstName() {
		if(count($_POST['firstname']) >= 3 &&  count($_POST['firstname']) <=50){
			$errorFirstName = "";
		} else{
			$errorFirstName = "<p>Please write your real name. Maximum lenght is 50 characters!</p>";
		}
	}

	function checkLastName() {
		if(count($_POST['lastname']) >= 3 &&  count($_POST['lastname']) <=50){
			$errorLastName = "";
		} else{
			$errorLastName = "<p>Please write your real name. Maximum lenght is 50 characters!</p>";
		}
	}

	function checkUsername() {
		if(count($_POST['username']) >= 3 &&  count($_POST['username']) <=16){
			$errorUsername = "";
		} else{
			$errorUsername = "<p>The userename can contain [a-z] and [0-9]. Maximum lenght is 16 characters!</p>";
		}
	}

	function checkPassword() {
		if(count($_POST['password']) >= 10 &&  count($_POST['password']) <=50){
			$errorPassword = "";
		} else{
			$errorPassword = "<p>Password must have 10 to 50 characters and can contain letters, numbers and symbols!</p>";
		}
	}

	function checkRepeatPassword() {
		if($_POST['password'] == $_POST['repeatpassword']){
			$errorRepeatPassword = "";
		} else{
			$errorRepeatPassword = "<p>Passwords don't match!</p>";
		}
	}

	function checkEmail($email) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errorEmail = "";
		} else{
			$errorEmail = "<p>Please write your real email address!</p>";
		}
	}

	function checkCheckbox() {
		if($_POST['checkbox'] == true){
			return $errorCheckbox = "";
		} else{
			$errorCheckbox = "<p>In order to create an account you must accept the terms and coditions!</p>";
		}
	}

	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username'])){

		$host = 'localhost';
		$dbname = 'ecommerce';
		$user = 'admin';
		$password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password
		
		try {
			// Connect to the PostgreSQL database
			$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		
			// Prepare the SQL statement with placeholders for variables
			$sql = "INSERT INTO customer (first_name, last_name, username, password, email) VALUES (:firstname, :lastname, :username, :password, email)";
			$stmt = $pdo->prepare($sql);
		
			// Bind the variables to the placeholders	
			$stmt -> bindParam(':firstname', $_POST['firstname']);
			$stmt -> bindParam(':lastname', $_POST['lastname']);
			$stmt -> bindParam(':username', $_POST['username']);
			$stmt -> bindParam(':password', $_POST['password']);
			$stmt -> bindParam(':email', $_POST['email']);
		
			// Execute the statement
			$stmt->execute();
		
			echo "Variables inserted successfully!";
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
}
 ?>

<html>
	<head>
		<title>eCommerce - Sign Up</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include('navbar.html') ?>
		<div class="sadrzaj">
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
					<input type="checkbox" name="" required> I accept the <a href="terms.html">terms and coditions</a>.
					<?= $errorCheckbox ?>
					<br>
					<br>
					<button type="submit">Register</button>
				</form>
			</div>
		</div>
	</body>
</html>