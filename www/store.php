<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Store</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
    <link rel="stylesheet" href="css/store.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <style>
        #footer{
          position: fixed;
          bottom: 0;
        }
        .badge-notify{
          background:red;
          position:relative;
          top: -20px;
          right: 10px;
        }
        .my-cart-icon-affix {
          position: fixed;
          z-index: 999;
        }
      </style>
    </head>
	<body>
	    <?php include('navbar.html') ?>
        <div class="page-header">
    <h1>Products
      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
      </div>
    </h1>
  </div>

<div class="row">
    <?php include('php_scripts/get_products.php'); ?>
<div>

<?php include('footer.html') ?>

<script src="jquery-mycart/js/jquery-2.2.3.min.js"></script>
<script type='text/javascript' src="jquery-mycart/js/bootstrap.min.js"></script>
<script type='text/javascript' src="jquery-mycart/js/jquery.mycart.js"></script>
<script type="text/javascript">
    $(function () {

      var goToCartIcon = function($addTocartBtn){
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
          top: position.top,
          left: position.left
        }, 500 , "linear", function() {
          $image.remove();
        });
      }

      $('.my-cart-btn').myCart({
        currencySymbol: '$',
        classCartIcon: 'my-cart-icon',
        classCartBadge: 'my-cart-badge',
        classProductQuantity: 'my-product-quantity',
        classProductRemove: 'my-product-remove',
        classCheckoutCart: 'my-cart-checkout',
        affixCartIcon: true,
        showCheckoutModal: true,
        numberOfDecimals: 2,
        cartItems: [
          
        ],
        clickOnAddToCart: function($addTocart, event){
        var quantityDisplay = $addTocart.parent().find('.product-quantity');
        var currentQuantity = parseInt(quantityDisplay.data('quantity'));

        if (currentQuantity > 0) {
            // Decrease the displayed quantity by 1
            quantityDisplay.text('(' + (currentQuantity - 1) + ')');
            quantityDisplay.data('quantity', currentQuantity - 1);

            // Perform other actions as needed
            goToCartIcon($addTocart);
        } else {
            // Display an error message
            alert("Cannot add more. Quantity is already 0.");

            // Prevent the default behavior of the button click
            event.preventDefault();
        }
        },

        afterAddOnCart: function(products, totalPrice, totalQuantity) {
          console.log("afterAddOnCart", products, totalPrice, totalQuantity);
        },
        clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
          console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
        },
        checkoutCart: function(products, totalPrice, totalQuantity) {
          var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
          checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
          $.each(products, function(){
            checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
          });
          alert(checkoutString)
          console.log("checking out", products, totalPrice, totalQuantity);
        },
        getDiscountPrice: function(products, totalPrice, totalQuantity) {
          console.log("calculating discount", products, totalPrice, totalQuantity);
          return totalPrice * 1; // no discount
        },
        
      });

      $("#addNewProduct").click(function(event) {
        var currentElementNo = $(".row").children().length + 1;
        $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
      });
    });
  </script>
		
	</body>
</html>
