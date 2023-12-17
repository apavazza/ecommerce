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

			session_start();

			// Prepare the SQL statement with placeholders for variables
			$query = "SELECT * FROM customer WHERE username = :username";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(':username', $_SESSION['username']);
			$stmt->execute();

			// Fetch the result
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$customer_id = $result['id_customer'];
            $customer_username = $result['username'];
            $customer_email = $result['email'];
            $customer_first_name = $result['first_name'];
            $customer_last_name = $result['last_name'];
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Customer Profile</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
			<div>
                <p>Customer ID: </p>
                <?= $customer_id ?>
                <p>Username: </p>
                <?= $customer_username ?>
                <p>Email: </p>
                <?= $customer_email ?>
                <p>First name: </p>
                <?= $customer_first_name ?>
                <p>Last name: </p>
                <?= $customer_last_name ?>
            </div>
	</body>
</html>