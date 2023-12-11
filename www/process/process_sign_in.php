<?php
	if(true){
		$host = 'postgres';
		$dbname = 'ecommerce';
		$user = 'admin';
		$password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password
		
		// Calculate password hash
		$passwordHash = hash('sha3-256', $_POST['password']);
		
		try {
			// Connect to the PostgreSQL database
			$conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			
			// Check if the connection was successful
			if (!$conn) {
				echo "Failed to connect to the database.";
				exit;
			}

			// Prepare the SQL statement with placeholders for variables
			$query = "SELECT password FROM customer WHERE username = 'd'";
			$result = pg_query($conn, $query);

			// Check if the query was successful
			if (!$result) {
				echo "Failed to retrieve the password.";
				exit;
			}

			// Close the database connection
			pg_close($conn);

			// Use the retrieved password as needed
			echo "The password for the customer is: " . $password;

			// Redirect to customer's profile
			header("Location: /customer/profile.php"); 

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
 ?>