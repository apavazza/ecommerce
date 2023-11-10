<?php
	$errorFirstName = "";
	$errorLastName = "";
	$errorUsername = "";
	$errorPassword = "";
	$errorRepeatPassword = "";
	$errorEmail = "";
	$errorCheckbox = "";

	function checkFirstName() {
		global $errorFirstName;
		if(count($_POST['firstname']) >= 3 &&  count($_POST['firstname']) <=50){
			$errorFirstName = "";
			return true;
		} else{
			$errorFirstName = "<p>Please write your real name. Maximum lenght is 50 characters!</p>";
			return false;
		}
	}

	function checkLastName() {
		global $errorLastName;
		if(count($_POST['lastname']) >= 3 &&  count($_POST['lastname']) <=50){
			$errorLastName = "";
			return true;
		} else{
			$errorLastName = "<p>Please write your real name. Maximum lenght is 50 characters!</p>";
			return false;
		}
	}

	function checkUsername() {
		global $errorUsername;
		if(count($_POST['username']) >= 3 &&  count($_POST['username']) <=16){
			$errorUsername = "";
			return true;
		} else{
			$errorUsername = "<p>The userename can contain [a-z] and [0-9]. Maximum lenght is 16 characters!</p>";
			return false;
		}
	}

	function checkPassword() {
		global $errorPassword;
		if(count($_POST['password']) >= 10 &&  count($_POST['password']) <=50){
			$errorPassword = "";
			return true;
		} else{
			$errorPassword = "<p>Password must have 10 to 50 characters and can contain letters, numbers and symbols!</p>";
			return false;
		}
	}

	function checkRepeatPassword() {
		global $errorRepeatPassword;
		if($_POST['password'] == $_POST['repeatpassword']){
			$errorRepeatPassword = "";
			return true;
		} else{
			$errorRepeatPassword = "<p>Passwords don't match!</p>";
			return false;
		}
	}

	function checkCheckbox() {
		global $errorCheckbox;
		if($_POST['checkbox'] == true){
			return $errorCheckbox = "";
			return true;
		} else{
			$errorCheckbox = "<p>In order to create an account you must accept the terms and coditions!</p>";
			return false;
		}
	}

	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && checkRepeatPassword()){
		

		$host = 'postgres';
		$dbname = 'ecommerce';
		$user = 'admin';
		$password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password
		
		// Calculate password hash
		$passwordHash = hash('sha3-256', $_POST['password']);

		try {
			// Connect to the PostgreSQL database
			$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		
			// Prepare the SQL statement with placeholders for variables
			$sql = "INSERT INTO customer (first_name, last_name, username, password, email) VALUES (:firstname, :lastname, :username, :password, :email)";
			$stmt = $pdo->prepare($sql);

			// Bind the variables to the placeholders	
			$stmt -> bindParam(':firstname', $_POST['firstname']);
			$stmt -> bindParam(':lastname', $_POST['lastname']);
			$stmt -> bindParam(':username', $_POST['username']);
			$stmt -> bindParam(':password', $passwordHash);
			$stmt -> bindParam(':email', $_POST['email']);
		
			// Execute the statement
			$stmt->execute();
		
			//echo "Variables inserted successfully!";

			// Redirect to success message
			header("Location: /process/process_sign_up.php"); 

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
					<input type="checkbox" name="checkbox" required> I accept the <a href="terms.html">terms and coditions</a>.
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