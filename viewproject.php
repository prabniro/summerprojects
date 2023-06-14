<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project List</title>
  <style>
    body {
      background-color: cream;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
    }

    .table th,
    .table td {
      padding: 8px;
      border: 1px solid #ccc;
    }
  </style>
</head>

<body>
  <div class="card">
    <?php
    // Include the database connection file
    include 'db_connect.php';

    // Retrieve projects from the database
    $query = "SELECT * FROM project_list";
    $result = mysqli_query($conn, $query);

    // Check if there are any projects
    if (mysqli_num_rows($result) > 0) {
      echo "<h2>Project List</h2>";
      echo "<table class='table'>";
      echo "<thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Manager ID</th><th>Action</th></tr></thead>";
      echo "<tbody>";

      // Loop through each project and display its details
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $status = $row['status'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $manager_id = $row['manager_id'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        echo "<td>$status</td>";
        echo "<td>$start_date</td>";
        echo "<td>$end_date</td>";
        echo "<td>$manager_id</td>";
        echo "<td><a href='deleteproject.php'>Delete</a></td>";

        echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
    } else {
      echo "<p>No projects found.</p>";
    }
    ?>
  </div>
</body>

</html>
