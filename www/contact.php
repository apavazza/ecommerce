<?php include('./php_scripts/contact_script.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Contact</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include('navbar.html') ?>
			<div class="content">
				<form class="field" method="POST">
					<h3>Contact</h3>
					<label>First name</label>
					<input type="text" name="firstname" required>
					<?= $$errorFirstName ?>
					<label>Last name</label>
					<input type="text" name="lastname" required>
					<?= $errorLastName ?>
					<label>Email</label>
					<input type="email" name="email" required>
					<label>Topic</label>
					<select name="subject">
						<option value="Message">Message</option>
						<option value="Bug report">Bug report</option>
						<option value="Complaint">Complaint</option>
						<option value="Legal">Legal</option>
						<option value="Other">Other</option>
					</select>
					<br>
					<textarea rows="10" required>
					</textarea>
					<br>
					<img src="/php_scripts/captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>
					<br>
					<label>Enter captcha</label><br />
					<input type="text" name="captcha" required/>
					<?= $errorCaptcha ?>
					<p>Can't read the image?
						<a href='javascript: refreshCaptcha();'>Click here</a> to refresh
					</p>
					<input type="checkbox" name="checkbox" required> I accept the <a href="terms.html">terms and conditions</a>.
					<br><br>
					<button type="submit">SEND</button>
				</form>
			</div>
		<?php include('footer.html') ?>
		<script>
			//Refresh Captcha
			function refreshCaptcha(){
				var img = document.images['captcha_image'];
				img.src = img.src.substring(
					0,img.src.lastIndexOf("?")
					)+"?rand="+Math.random()*1000;
			}
		</script>
	</body>
</html>