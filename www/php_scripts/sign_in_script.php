<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$db_host = 'postgres';
		$db_name = 'ecommerce';
		$db_user = 'admin';
		$db_password = '~a5Xf;UB}^3kchY'; //only for testing purposes, not an actual password
		
		// Calculate password hash
		$passwordHash = hash('sha3-256', $_POST['password']);
		$staySignedIn = $_POST['stay-signed-in'];
		
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
			$query = "SELECT id_customer, password FROM customer WHERE username = :username";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(':username', $_POST['username']);
			$stmt->execute();

			// Fetch the result
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$customer_id = $result['id_customer'];
			$customer_password = $result['password'];

			// Check if the query was successful
			if (!$result) {
				$errorUsername = "<p>This username does not exist</p>";
			} elseif ($customer_password == $passwordHash) {
				// Redirect to customer's profile
				session_start();
				$_SESSION['customer_id'] = $customer_id;
				setcookie('customer_session', $customer_id, 0, '/');
				if($staySignedIn){
					setcookie('customer_permanent', $customer_id, time() + (30 * 24 * 60 * 60), '/');
				}
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