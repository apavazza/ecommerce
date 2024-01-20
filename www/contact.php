<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Contact</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
			#footer{
          		position: fixed;
          		bottom: 0;
        	}
		</style>
	</head>
	<body>
		<?php include('navbar.html') ?>
		<div class="sadrzaj">
			<div class="content">
				<form class="field" action="/php_scripts/send.php" method="POST">
					<h3>Contact</h3>
					<label>First name</label>
					<input type="text" name="firstname">
					<label>Last name</label>
					<input type="text" name="lastname">
					<label>Email</label>
					<input type="email" name="email">
					<label>Topic</label>
					<select name="subject">
					<option value="4">Message</option>
					<option value="3">Bug report</option>
					<option value="3">Complaint</option>
					<option value="2">Legal</option>
					<option value="1">Other</option>
					</select>
					<input type="checkbox" name=""> I accept the <a href="terms.html">terms and conditions</a>.
					<br>
					<br>
					<textarea rows="10">
					</textarea>
					<button type="submit">SEND</button>
				</form>
			</div>
		</div>
		</div>
		<?php include('footer.html') ?>
	</body>
</html>