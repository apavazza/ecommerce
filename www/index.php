<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Home</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
		<link rel="stylesheet" href="css/homepage.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include('navbar.html') ?>
		<div class="slider">
			<img src="images/img1.jpg" alt="" />
			<img src="images/img2.jpg" alt="" />
			<img src="images/img3.jpg" alt="" />
		</div>

		<div class="sadrzaj">
			<div class="content">
				<h2>eCommerce</h2>
				<p>Aplikacija sustava online kupovine je mobilna aplikacija dizajnirana kako bi pružila praktičnu i korisnički prijateljsku platformu korisnicima za pregledavanje, pretraživanje i kupovinu proizvoda putem interneta. Ova aplikacija ima za cilj unaprijediti iskustvo kupovine pružajući širok raspon proizvoda, sigurne načine plaćanja, personalizirane preporuke i jednostavno praćenje narudžbi. S obzirom na sve veću popularnost mobilnih uređaja, aplikacija sustava online kupovine omogućuje korisnicima da kupuju u bilo koje vrijeme i s bilo kojeg mjesta. Ova aplikacija je dizajnirana kako bi zadovoljila potrebe suvremenih potrošača koji preferiraju jednostavnost i dostupnost kupovine putem mobilnih uređaja. Pružajući intuitivan i jednostavan korisnički sučelje, aplikacija sustava online kupovine ima za cilj modernizirati način na koji ljudi kupuju i povezivati kupce s prodavateljima na digitalnom tržištu.</p>
			</div>
		</div>

		<div id="news">
			<div class="content">
				<div class="article">
					<a href="">
						<img src="images/fesb-logo.png">
						<h3>Naslov 1</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at dolor eu est vulp</p>
						<span>Read More</span>
					</a>
				</div>

				<div class="article">
					<a href="">
						<img src="images/fesb-logo.png">
						<h3>Naslov 2</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at dolor eu est vulp</p>
						<span>Read More</span>
					</a>
				</div>

				<div class="article">
					<a href="">
						<img src="images/fesb-logo.png">
						<h3>Naslov 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at dolor eu est vulp</p>
						<span>Read More</span>
					</a>
				</div>
			</div>
		</div>

		<?php include('footer.html') ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>
		<script type="text/javascript">

			$(document).ready(function(){
			  $('.slider').slick({
			  	dots: true, autoplay: true, autoplaySpeed: 2000,
			  });
			});
		</script>
	</body>
</html>