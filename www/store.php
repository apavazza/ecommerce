<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Store</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/jquery-mycart-master/css/bootstrap.min.css">
		<script src="/jquery-mycart-master/js/jquery.mycart.min.js"></script>
		<script src="/jquery-mycart-master/js/bootstrap.min.js"></script>
		<script src="/jquery-mycart-master/js/jquery.mycart.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>
		<?php include('navbar.html') ?>

		<div class="row">
02
	  <div class="col-md-3 text-center">
03
	    <img src="images/pexels-alena-shekhovtcova-6995868.jpg" width="150px" height="150px">
04
	    <br>
05
	    product 1 - <strong>$10</strong>
06
	    <br>
07
	    <button class="btn btn-danger my-cart-btn" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="images/pexels-alena-shekhovtcova-6995868.jpg">Add to Cart</button>
08
	    <a href="#" class="btn btn-info">Details</a>
09
	  </div>
10
	 
11
	  <div class="col-md-3 text-center">
12
	    <img src="images/pexels-alena-shekhovtcova-6995868.jpg" width="150px" height="150px">
13
	    <br>
14
	    product 2 - <strong>$20</strong>
15
	    <br>
16
	    <button class="btn btn-danger my-cart-btn" data-id="2" data-name="product 2" data-summary="summary 2" data-price="20" data-quantity="1" data-image="images/pexels-alena-shekhovtcova-6995868.jpg">Add to Cart</button>
17
	    <a href="#" class="btn btn-info">Details</a>
18
	  </div>
19
	 
20
	  <div class="col-md-3 text-center">
21
	    <img src="images/pexels-alena-shekhovtcova-6995868.jpg" width="150px" height="150px">
22
	    <br>
23
	    product 3 - <strong>$30</strong>
24
	    <br>
25
	    <button class="btn btn-danger my-cart-btn" data-id="3" data-name="product 3" data-summary="summary 3" data-price="30" data-quantity="1" data-image="images/pexels-alena-shekhovtcova-6995868.jpg">Add to Cart</button>
26
	    <a href="#" class="btn btn-info">Details</a>
27
	  </div>
28
	 
29
	  <div class="col-md-3 text-center">
30
	    <img src="images/pexels-alena-shekhovtcova-6995868.jpg" width="150px" height="150px">
31
	    <br>
32
	    product 4 - <strong>$40</strong>
33
	    <br>
34
	    <button class="btn btn-danger my-cart-btn" data-id="4" data-name="product 4" data-summary="summary 4" data-price="40" data-quantity="1" data-image="images/pexels-alena-shekhovtcova-6995868.jpg">Add to Cart</button>
35
	    <a href="#" class="btn btn-info">Details</a>
36
	  </div>
37
	 
38
	  <div class="col-md-3 text-center">
39
	    <img src="images/pexels-alena-shekhovtcova-6995868.jpg" width="150px" height="150px">
40
	    <br>
41
	    product 5 - <strong>$50</strong>
42
	    <br>
43
	    <button class="btn btn-danger my-cart-btn" data-id="5" data-name="product 5" data-summary="summary 5" data-price="50" data-quantity="1" data-image="images/pexels-alena-shekhovtcova-6995868.jpg">Add to Cart</button>
44
	    <a href="#" class="btn btn-info">Details</a>
45
	  </div>
46
	 
47
	</div>

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
			classCartIcon: 'my-cart-icon',
			classCartBadge: 'my-cart-badge',
			affixCartIcon: true,
			checkoutCart: function(products) {
				$.each(products, function(){
				console.log(this);
				});
			},
			clickOnAddToCart: function($addTocart){
				goToCartIcon($addTocart);
			},
			getDiscountPrice: function(products) {
				var total = 0;
				$.each(products, function(){
				total += this.quantity * this.price;
				});
				return total * 0.5;
			}
			});

			});


		</script>
	</body>
</html>