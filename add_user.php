<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the user details from the form submission
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $type = $_POST['type'];
  $avatar = $_POST['avatar'];

  // Prepare the INSERT statement
  $query = "INSERT INTO users (firstname, lastname, email, password, type, avatar, date_created) VALUES ('$firstname', '$lastname', '$email', '$password', '$type', '$avatar', NOW())";

  // Execute the INSERT statement
  if (mysqli_query($conn, $query)) {
    echo "User added successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .card {
      background-color: #FDF5E6;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 400px;
      margin: 0 auto;
    }

    .card h2 {
      text-align: center;
    }

    .card .form-group {
      margin-bottom: 15px;
    }

    .card label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .card input,
    .card select {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .card button {
      width: 100%;
      padding: 10px;
      border-radius: 4px;
      border: none;
      background-color: #4CAF50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    .card button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Add User</h2>
    <form method="POST" action="add_user.php">
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="type">Type</label>
        <select id="type" name="type" required>
          <option value="1">Admin</option>
          <option value="2">Staff</option>
        </select>
      </div>
      <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="text" id="avatar" name="avatar">
      </div>
      <button type="submit">Add User</button>
    </form>
  </div>
</body>
</html>

<?php include 'viewuser.php'; ?>