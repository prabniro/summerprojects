<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the project ID and new status from the form submission
  $project_id = $_POST['project_id'];
  $new_status = $_POST['new_status'];

  // Prepare the UPDATE statement
  $query = "UPDATE project_list SET status = '$new_status' WHERE id = '$project_id'";

  // Execute the UPDATE statement
  if (mysqli_query($conn, $query)) {
    echo "Project status updated successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modify Project Status</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .mb-3 {
      margin-bottom: 15px;
    }

    .form-label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    select.form-control {
      height: 34px;
    }

    .btn {
      display: inline-block;
      padding: 8px 12px;
      font-size: 14px;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    .btn-primary {
      background-color: #007bff;
    }
  </style>
</head>

<body>
  <h2>Modify Project Status</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="project_id" class="form-label">Project ID</label>
      <input type="text" class="form-control" id="project_id" name="project_id" required>
    </div>
    <div class="mb-3">
      <label for="new_status">New Status:</label>
      <select name="new_status" class="form-control">
      <option value="0">Pending</option>
      <option value="1">Started</option>
      <option value="2">On-Progress</option>
      <option value="3">On-Hold</option>
      <option value="4">Over Due</option>
      <option value="5">Done</option>
      </select><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
  </form>
</body>

</html>
