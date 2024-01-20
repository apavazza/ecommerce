<?php
if (true) {
    $db_host = 'postgres';
    $db_name = 'ecommerce';
    $db_user = 'admin';
    $db_password = '~a5Xf;UB}^3kchY'; // Only for testing purposes, not an actual password

    try {
        // Connect to the PostgreSQL database
        $conn = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        session_start();

        // Prepare the SQL statement with placeholders for variables
        $query = "SELECT * FROM customer WHERE id_customer = :id_customer";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_customer', $_SESSION['customer_id']);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $customer_id = $result['id_customer'];
        $customer_username = $result['username'];
        $customer_email = $result['email'];
        $customer_first_name = $result['first_name'];
        $customer_last_name = $result['last_name'];
        $customer_avatar = $result['avatar'];

        // Check if the avatar data exists
        if (false) {
            // Determine the image type based on your data
            $imageType = 'jpeg'; // Change this based on your actual image type

            // Create a data URI for the image
            $avatarSrc = 'data:image/' . $imageType . ';base64,' . base64_encode($customer_avatar);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>