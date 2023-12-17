<?php
	$errorUsername = "";
	$errorPassword = "";

	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$db_host = 'postgres';
		$db_name = 'ecommerce';
		$db_user = 'admin';
		$db_password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password
		
		// Calculate password hash
		$passwordHash = hash('sha3-256', $_POST['password']);
		
		try {
			// Connect to the PostgreSQL database
			$conn = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Check if the connection was successful
			if (!$conn) {
				echo "Failed to connect to the database.";
				exit;
			}

			// Prepare the SQL statement with placeholders for variables
			$query = "SELECT password FROM customer WHERE username = :username";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(':username', $_POST['username']);
			$stmt->execute();

			// Fetch the result
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$password = $result['password'];

			// Check if the query was successful
			if (!$result) {
				$errorUsername = "<p>This username does not exist</p>";
			} elseif ($password == $passwordHash) {
				// Redirect to customer's profile
				session_start();
				$_SESSION['username'] = $_POST['username'];
				header("Location: /customer/profile.php");
				exit();
			} else{
				$errorPassword = "<p>Incorrect password</p>";
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
?>

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
				<form class="field" method="POST">
					<h2>Sign in</h2>
					<br>
					<input type="text" name="username" placeholder="Username" >
					<?= $errorUsername ?>
					<br>
					<input type="password" name="password" placeholder="Password" autocomplete="off" >
					<?= $errorPassword ?>
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