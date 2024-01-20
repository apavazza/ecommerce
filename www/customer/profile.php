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
						<td id="username-value">
							<?= $customer_username ?>
						</td>
						<td>
							<button id="edit-username">Edit</button>
						</td>
					</tr>
					<tr>
						<td>
							<label>Email: </label>
						</td>
						<td id="email-value">
							<?= $customer_email ?>
						</td>
						<td>
							<button id="edit-email">Edit</button>
						</td>
					</tr>
					<tr>
						<td>
							<label>First name: </label>
						</td>
						<td id="first-name-value">
							<?= $customer_first_name ?>
						</td>
						<td>
							<button id="edit-first-name">Edit</button>
						</td>
					</tr>
					<tr>
						<td>
							<label>Last name: </label>
						</td>
						<td id="last-name-value">
							<?= $customer_last_name ?>
						</td>
						<td>
							<button id="edit-last-name">Edit</button>
						</td>
					</tr>
				</table>
				<img src="<?= $avatarSrc ?>" alt="User Avatar">
			</div>
		</main>
		<script src="../js_scripts/profile.js"></script>
	</body>
</html>