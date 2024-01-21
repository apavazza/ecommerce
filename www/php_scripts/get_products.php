<?php

$host = "postgres";
$dbname = "ecommerce";
$user = "admin";
$password = "~a5Xf;UB}^3kchY";

$productImages = array(
    'FESB hudica' => 'images/black-sweater-apparel-shoot-with-design-space.jpg',
    'FESB hudica Pro' => 'images/pexels-alena-shekhovtcova-6995868.jpg',
    'FESB hudica Pro+' => 'images/white-hoodie-man-with-green-pants-city.jpg',
    // Dodajte ostale proizvode prema potrebi
);

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
        
            if (isset($productImages[$productName])) {
                $productImage = $productImages[$productName];
            } else {
                $productImage = 'images/fesb-logo.png';
            }
        
            echo '<div class="col-md-3 text-center">';
            echo '<img src="' . $productImage . '" width="150px" height="150px">';
            echo '<br>';
            echo $productName . ' - <strong>' . $productPrice . '</strong> <span class="product-quantity" data-id="' . $productId . '" data-quantity="' . $productQuantity . '">(' . $productQuantity . ')</span>';
            echo '<br>';
            echo '<button class="btn btn-danger my-cart-btn" data-id="' . $productId . '" data-name="' . $productName  . '" data-price="' . $productPrice . '" data-image="' . $productImage . '" data-quantity="1"' . $productQuantity . '">Add to Cart</button>';
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
