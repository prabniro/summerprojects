<?php
include("db_connect.php");
?>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
include_once 'db_connect.php';
if(isset($_POST['submit']))
{    

     $code = $_POST['code'];
     $username = $_POST['username'];
	 $role = $_POST['role'];
	 $email = $_POST['email'];
     $sql = "INSERT INTO  settings(code, username, role, email)
     VALUES ('$code','$username','$role','$email')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
  

}
else{
  echo "unsucessfull";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	
</head>
<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		.section {
			margin-bottom: 30px;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}
		h2 {
			margin-top: 0;
		}
		form {
			max-width: 500px;
			margin: 0 auto;
		}
		input[type=text],
		input[type=email],
		input[type=password],
		select {
			padding: 10px;
			margin: 10px 0;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			float: right;
		}
		button:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<h1>User Management</h1>

	<div class="section">
		<h2>Add User</h2>
		<form method="post" action="" id="user-form">
			<label for="personal-code">Personal Code:</label>
			<input type="text" id="personal-code" name="code" required>

			<label for="role">Role:</label>
			<select id="role" name="role" required>
				<option value="manager">Manager</option>
				<option value="employee">Employee</option>
			</select>

			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<button type="submit" name="submit">Add User</button>
		</form>
		<p id="error-message" class="error"></p>
	</div>
	<div class="section">
		<h2>Change Password</h2>
		<form id="change-password-form">
			<label for="current-password">Current Password:</label>
			<input type="password" id="current-password" name="current-password" required>

			<label for="new-password">New Password:</label>
			<input type="password" id="new-password" name="new-password" required>

			<label for="retype-password">Retype Password:</label>
			<input type="password" id="retype-password" name="retype-password" required>

			<button type="submit">Change Password</button>
		</form>
		<p id="password-error-message" class="error"></p>
	</div>

	<script>
		const managerForm = document.getElementById('manager-form');
		const friendForm = document.getElementById('friend-form');
		const passwordForm = document.getElementById('change-password-form');
		const managerErrorMessage = document.getElementById('manager-error-message');
		const friendErrorMessage = document.getElementById('friend-error-message');
		const passwordErrorMessage = document.getElementById('password-error-message');

		managerForm.addEventListener('submit', (event) => {
			event.preventDefault();
			const managerUsername = document.getElementById('manager-username').value;
			const managerEmail = document.getElementById('manager-email').value;

			// Call a function to add the manager to the system
			addManager(managerUsername, managerEmail);

			// Clear the form and display a success message
			managerForm.reset();
			managerErrorMessage.innerText = 'Manager added successfully!';
		});

		friendForm.addEventListener('submit', (event) => {
			event.preventDefault();
			const friendUsername = document.getElementById('friend-username').value;
			const friendEmail = document.getElementById('friend-email').value;

			// Call a function to add the friend to the system
			addFriend(friendUsername, friendEmail);

			// Clear the form and display a success message
			friendForm.reset();
			friendErrorMessage.innerText = 'Friend added successfully!';
		});

		passwordForm.addEventListener('submit', (event) => {
			event.preventDefault();
			const currentPassword = document.getElementById('current-password').value;
			const newPassword = document.getElementById('new-password').value;
			const retypePassword = document.getElementById('retype-password').value;

			if (newPassword !== retypePassword) {
				passwordErrorMessage.innerText = 'Passwords do not match';
				return;
			}

			// Call a function to validate the current password
			if (!validateCurrentPassword(currentPassword)) {
				passwordErrorMessage.innerText = 'Invalid current password';
				return;
			}

			// Call a function to update the password
			updatePassword(newPassword);

			// Clear the form and display a success message
			passwordForm.reset();
			passwordErrorMessage.innerText = 'Password successfully changed!';
		});

		function addManager(username, email) {
			// Replace this function with your own logic to add a manager
			console.log(`Adding manager: ${username} (${email})`);
		}

		function addFriend(username, email) {
			// Replace this function with your own logic to add a friend
			console.log(`Adding friend: ${username} (${email})`);
		}

		function validateCurrentPassword(currentPassword) {
			// Replace this function with your own validation logic
			return true;
		}

		function updatePassword(newPassword) {
			// Replace this function with your own password update logic
			console.log(`Updating password to ${newPassword}`);
		}
	</script>
</body>
</html>
