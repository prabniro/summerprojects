<?php
// Include the database connection file
include 'db_connect.php';

// Retrieve users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
  echo "<h2>User List</h2>";
  echo "<table class='table'>";
  echo "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>Type</th><th>Avatar</th><th>Date Created</th></tr></thead>";
  echo "<tbody>";

  // Loop through each user and display their details
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $password = $row['password'];
    $type = $row['type'];
    $avatar = $row['avatar'];
    $date_created = $row['date_created'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$firstname</td>";
    echo "<td>$lastname</td>";
    echo "<td>$email</td>";
    echo "<td>$password</td>";
    echo "<td>$type</td>";
    echo "<td>$avatar</td>";
    echo "<td>$date_created</td>";
    echo "</tr>";
  }

  echo "</tbody>";
  echo "</table>";
} else {
  echo "No users found.";
}
?>
<style>
  h2 {
    text-align: center;
    margin-top: 0;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .table th,
  .table td {
    padding: 8px;
    border: 1px solid #ccc;
    text-align: left;
  }

  .table thead th {
    background-color: #f2f2f2;
  }

  .table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .table tbody tr:hover {
    background-color: #ebebeb;
  }
</style>
