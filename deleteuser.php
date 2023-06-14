<?php
// Include the database connection file
//<a href="delete_user.php?id=USER_ID" class="btn btn-danger">Delete User</a>
 
include 'db_connect.php';

// Check if the user ID is provided
if (isset($_GET['id'])) {
  // Retrieve the user ID from the query string
  $user_id = $_GET['id'];

  // Prepare the DELETE statement
  $query = "DELETE FROM users WHERE id='$user_id'";

  // Execute the DELETE statement
  if (mysqli_query($conn, $query)) {
    echo "User deleted successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
