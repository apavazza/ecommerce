<?php

$host = "postgres";
$dbname = "ecommerce";
$user = "admin";
$password = "~a5Xf;UB}^3kchY";

try {
    // Uspostavi vezu s bazom podataka
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Postavi PDO opcije
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Izvrši upit za dohvaćanje proizvoda
    $query = "SELECT * FROM product";
    $result = $conn->query($query);

    // Provjeri rezultat upita
    if ($result) {
        // Iteriraj kroz rezultate i prikaži proizvode
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $productId = $row['id_product'];
            $productName = $row['name'];
            $productPrice = floatval($row['price']);
            $productQuantity = floatval($row['available_quantity']);
            $productImage = $row['image'];
        
            if (!isset($productImage)) {
                $productImage = 'images/fesb-logo.png';
            }

            if ($productImage !== null && is_resource($productImage) && get_resource_type($productImage) === 'stream') {
                // Read the content of the stream
                $productImageContent = stream_get_contents($productImage);
            
                // Determine the image type based on your data
                $imageType = 'jpeg'; // Change this based on your actual image type
            
                // Create a data URI for the image
                $productImageSrc = 'data:image/' . $imageType . ';base64,' . base64_encode($productImageContent);
            }
        
            echo '<div class="col-md-3 text-center">';
            echo '<img src="' . $productImageSrc . '" width="150px" height="150px" style="object-fit: cover;">';
            echo '<br>';
            echo $productName . ' - <strong>' . $productPrice . '</strong> <span class="product-quantity" data-id="' . $productId . '" data-quantity="' . $productQuantity . '">(' . $productQuantity . ')</span>';
            echo '<br>';
            echo '<button class="btn btn-danger my-cart-btn" data-id="' . $productId . '" data-name="' . $productName  . '" data-price="' . $productPrice . '" data-image="' . $productImageSrc . '" data-quantity="1"' . $productQuantity . '">Add to Cart</button>';
            echo '<a href="#" class="btn btn-info">Details</a>';
            echo '</div>';
        }
        
    } else {
        echo "No products found.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
