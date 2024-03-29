<?php
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
		} else{
			// the username does not exist
			return true;
		}
	}

	function checkFirstName() {
		global $errorFirstName;
		if(strlen(!empty($_POST['firstname'])) && strlen($_POST['firstname']) <=128){
			$errorFirstName = "";
			return true;
		} else{
			$errorFirstName = "<p style='color: red'>Please write your first name (up to 128 characters)</p>";
			return false;
		}
	}

	function checkLastName() {
		global $errorLastName;
		if(strlen(!empty($_POST['lastname'])) && strlen($_POST['lastname']) <=128){
			$errorLastName = "";
			return true;
		} else{
			$errorLastName = "<p style='color: red'>Please write your last name (up to 128 characters)</p>";
			return false;
		}
	}

	function checkUsername() {
		global $errorUsername;
		if(strlen($_POST['username']) >= 3 &&  strlen($_POST['username']) <=32 && preg_match("/^[a-z0-9]+$/", $_POST['username'])){
			// check whether the username is taken
			if(usernameAvailable()){
				$errorUsername = "";
				return true;
			} else{
				$errorUsername = "<p style='color: red'>This username is already taken</p>";
				return false;
			}
		} else{
			$errorUsername = "<p style='color: red'>The userename can contain [a-z] and [0-9]. Lenght has to be from 3 to 32 characters.</p>";
			return false;
		}
	}

	function checkPassword() {
		global $errorPassword;
		if(strlen($_POST['password']) >= 10 &&  strlen($_POST['password']) <=64){
			$errorPassword = "";
			return true;
		} else{
			$errorPassword = "<p style='color: red'>Password must have 10 to 64 characters and can contain letters, numbers and symbols</p>";
			return false;
		}
	}

	function checkRepeatPassword() {
		global $errorRepeatPassword;
		if($_POST['password'] == $_POST['repeatpassword']){
			$errorRepeatPassword = "";
			return true;
		} else{
			$errorRepeatPassword = "<p style='color: red'>Passwords don't match!</p>";
			return false;
		}
	}

	function checkCheckbox() {
		global $errorCheckbox;
		if($_POST['checkbox'] == true){
			return $errorCheckbox = "";
			return true;
		} else{
			$errorCheckbox = "<p style='color: red'>In order to create an account you must accept the terms and coditions!</p>";
			return false;
		}
	}

	function checkCaptcha(){
		session_start();
		global $errorCaptcha;
		if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
			// Validation: Checking entered captcha code with the generated captcha code
			if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
				// Note: the captcha code is compared case insensitively.
				// if you want case sensitive match, check above with strcmp()
				$errorCaptcha = "<p style='color: red'>
				Entered captcha code does not match!</p>";
				return false;
			} else{
				return true;
			}
		}
	}

	if(!empty($_POST['firstname']) && checkFirstName() && checkLastName() && checkUsername() && checkPassword() && checkRepeatPassword() && checkCaptcha()){
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