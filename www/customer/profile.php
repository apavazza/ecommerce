<?php include('../php_scripts/customer_profile_script.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>eCommerce - Customer Profile</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/icons8-e-commerce-64.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" href="/css/customer_profile.css">
		<link rel="stylesheet" href="/css/navbar.css">
	</head>
	<body>
		<nav>
		<?php include('../navbar.html') ?>
		</nav>
		<main>
			<div id="profile-content">
				<div id="profile">
					<h3>My Profile</h3>
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
						<tr>
							<td>
								<label>Date of birth: </label>
							</td>
							<td id="date-of-birth-value">
								<?= $customer_date_of_birth ?>
							</td>
							<td>
								<button id="edit-date-of-birth">Edit</button>
							</td>
						</tr>
						<tr>
							<td>
								<label>Address: </label>
							</td>
							<td id="address-value">
								<?= $customer_address ?>
							</td>
							<td>
								<button id="edit-address">Edit</button>
							</td>
						</tr>
					</table>
				</div>
				
				<div id="avatar">
					<img src="<?= $avatarSrc ?>" id="avatar-img" alt="User Avatar">
        			<input type="file" id="new-avatar" name="new-avatar" accept=".jpg, .jpeg">
       				<button type="submit" id="edit-avatar">Update</button>
				</div>
				<div>
					<h3>My Purchases</h3>
					<table id="purchases">
						<thead>
							<tr>
								<th>No</th>
								<th>Item</th>
								<th>Date</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</main>
		<script type="module" src="../js_scripts/profile.js"></script>
		<script src="../js_scripts/navbar.js"></script>
	</body>
</html>