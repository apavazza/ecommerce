<?php
	if(true){
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
				echo "Failed to retrieve the password.";
				exit;
			}

			// Use the retrieved password as needed
			if($password == $passwordHash){
				// Redirect to customer's profile
				header("Location: /customer/profile.php"); 
			} else{
				echo "You have entered a wrong password";
			}

			

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
 ?>