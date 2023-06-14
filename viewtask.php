<?php
// Include the database connection file
include 'db_connect.php';

// Fetch the task data from the database
$sql = "SELECT * FROM task_list";
$result = $conn->query($sql);
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
      border: 1px solid green;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #ADD8E6;
    }
  </style>
</head>
<body>
  <h2>Task List</h2>
  <table>
    <tr>
      <th>Task ID</th>
      <th>Project ID</th>
      <th>Task</th>
      <th>Description</th>
      <th>Status</th>
      <th>Date Created</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      // Display the tasks
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['project_id'] . "</td><td>" . $row['task'] . "</td><td>" . $row['description'] . "</td><td>" . $row['status'] . "</td><td>" . $row['date_created'] . "</td></tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No tasks found.</td></tr>";
    }
    ?>
  </table>
</body>
</html>
