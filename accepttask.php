<?php
// Include auth_session.php file on all user panel pages
include("auth_session.php");

// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept'])) {
  // Retrieve current time and accepter username
  $current_time = date('Y-m-d H:i:s');
  $accepter_username = $_POST['accepter_username'];
  
  // Display current time and accepter username
  echo "Accepted at: " . $current_time . "<br>";
  echo "Accepted by: " . $accepter_username . "<br>";
}

// Retrieve data from the database
$query = "SELECT * FROM assign";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    button {
      padding: 6px 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Assigned Tasks</h2>
  <table>
    <tr>
      <th>Project</th>
      <th>Task</th>
      <th>User</th>
      <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['project']; ?></td>
      <td><?php echo $row['task']; ?></td>
      <td><?php echo $row['user']; ?></td>
      <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="hidden" name="accepter_username" value="<?php echo $_SESSION['username']; ?>">
          <button type="submit" name="accept">Accept</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
