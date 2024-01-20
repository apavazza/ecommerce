<?php include('../php_scripts/customer_profile_script.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Customer Profile</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" href="/css/customer_profile.css">
	</head>
	<body>
		<nav>
		
		</nav>
		<main>
			<div class="profile-content">
				<table>
					<tr>
						<td>
							<label>Customer ID: </label>
						</td>
						<td>
							<?= $customer_id ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Username: </label>
						</td>
						<td>
							<?= $customer_username ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Email: </label>
						</td>
						<td>
							<?= $customer_email ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>First name: </label>
						</td>
						<td>
							<?= $customer_first_name ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Last name: </label>
						</td>
						<td>
							<?= $customer_last_name ?>
						</td>
					</tr>
				</table>
				<img src="<?= $avatarSrc ?>" alt="User Avatar">
			</div>
		</main>
	</body>
</html>