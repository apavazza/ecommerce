<?php
	$errorFirstName = "";
	$errorLastName = "";
	$errorUsername = "";
	$errorPassword = "";
	$errorRepeatPassword = "";
	$errorEmail = "";
	$errorCheckbox = "";

	$db_host = 'postgres';
	$db_name = 'ecommerce';
	$db_user = 'admin';
	$db_password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password

	function usernameAvailable(){
		global $db_host;
		global $db_name;
		global $db_user;
		global $db_password;
		// Connect to the PostgreSQL database
		$conn = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Check if the connection was successful
		if (!$conn) {
			echo "Failed to connect to the database.";
			exit;
		}

		// Prepare the SQL statement with placeholders for variables
		$query = "SELECT username FROM customer WHERE username = :username";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':username', $_POST['username']);
		$stmt->execute();

		// Fetch the result
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result){
			// the username already exists
			return false;
		} {
			// the username does not exist
			return true;
		}
	}

	function checkFirstName() {
		global $errorFirstName;
		if(strlen($_POST['firstname']) >= 3 &&  strlen($_POST['firstname']) <=128){
			$errorFirstName = "";
			return true;
		} else{
			$errorFirstName = "<p>Please write your real name (3-128 characters)</p>";
			return false;
		}
	}

	function checkLastName() {
		global $errorLastName;
		if(strlen($_POST['lastname']) >= 3 &&  strlen($_POST['lastname']) <=128){
			$errorLastName = "";
			return true;
		} else{
			$errorLastName = "<p>Please write your real name (3-128 characters)</p>";
			return false;
		}
	}

	function checkUsername() {
		global $errorUsername;
		if(strlen($_POST['username']) >= 3 &&  strlen($_POST['username']) <=32 && preg_match("/^[a-z0-9]+$/", $_POST['username'])){
			// chech whether the username is taken
			if(usernameAvailable()){
				$errorUsername = "";
				return true;
			} else{
				$errorUsername = "<p>This username is already taken</p>";
				return false;
			}
		} else{
			$errorUsername = "<p>The userename can contain [a-z] and [0-9]. Lenght has to be from 3 to 32 characters!</p>";
			return false;
		}
	}

	function checkPassword() {
		global $errorPassword;
		if(strlen($_POST['password']) >= 10 &&  strlen($_POST['password']) <=64){
			$errorPassword = "";
			return true;
		} else{
			$errorPassword = "<p>Password must have 10 to 64 characters and can contain letters, numbers and symbols</p>";
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

	if(!empty($_POST['firstname']) && checkFirstName() && checkLastName() && checkUsername() && checkPassword() && checkRepeatPassword()){
		global $db_host;
		global $db_name;
		global $db_user;
		global $db_password;
		
		// Calculate password hash
		$passwordHash = hash('sha3-256', $_POST['password']);

		try {
			// Connect to the PostgreSQL database
			$pdo = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
		
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

			// Redirect to success message
			header("Location: /sign_up_success.php"); 

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
}
 ?>

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