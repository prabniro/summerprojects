<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the project details from the form submission
  $name = $_POST['name'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $manager_id = $_POST['manager_id'];
  $user_ids = implode(',', $_POST['user_ids']); // Convert array to comma-separated string

  // Prepare the INSERT statement
  $query = "INSERT INTO project_list (name, description, status, start_date, end_date, manager_id, user_ids) VALUES ('$name', '$description', '$status', '$start_date', '$end_date', '$manager_id', '$user_ids')";

  // Execute the INSERT statement
  if (mysqli_query($conn, $query)) {
    echo "Project created successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}


// Retrieve managers from the users table
$manager_query = "SELECT id, firstname, lastname FROM users WHERE type = 1";
$manager_result = mysqli_query($conn, $manager_query);
$managers = mysqli_fetch_all($manager_result, MYSQLI_ASSOC);

// Retrieve users from the users table
$user_query = "SELECT id, firstname, lastname FROM users WHERE type = 2";
$user_result = mysqli_query($conn, $user_query);
$users = mysqli_fetch_all($user_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Project</title>
</head>

<body>
  <h2>Create Project</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
    <label for="status">Status:</label>
    <select name="status">
    <option value="0">Pending</option>
      <option value="1">Started</option>
      <option value="2">On-Progress</option>
      <option value="3">On-Hold</option>
      <option value="4">Over Due</option>
      <option value="5">Done</option>
    </select><br><br>
    
    <div class="mb-3">
      <label for="start_date" class="form-label">Start Date</label>
      <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>
    <div class="mb-3">
      <label for="end_date" class="form-label">End Date</label>
      <input type="date" class="form-control" id="end_date" name="end_date" required>
    </div>
    <div class="mb-3">
      <label for="manager_id" class="form-label">Manager ID</label>
      <input type="text" class="form-control" id="manager_id" name="manager_id" required>
    </div>
    <div class="mb-3">
      <label for="user_ids" class="form-label">User IDs (comma-separated)</label>
      <input type="text" class="form-control" id="user_ids" name="user_ids" required>
    </div>
    <div class="mb-3">
      <label for="manager_id" class="form-label">Manager</label>
      <select class="form-control" id="manager_id" name="manager_id" >
        <?php foreach ($managers as $manager) : ?>
          <option value="<?php echo $manager['id']; ?>"><?php echo $manager['firstname'] . ' ' . $manager['lastname']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="user_ids" class="form-label">Users (comma-separated)</label>
      <select multiple class="form-control" id="user_ids" name="user_ids[]" required>
        <?php foreach ($users as $user) : ?>
          <option value="<?php echo $user['id']; ?>"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
  </form>
</body>

</html>
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

  .form-label {
    font-weight: bold;
    margin-bottom: 8px;
  }

  .form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    transition: border-color 0.3s;
  }

  .form-control:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .btn-primary {
    background-color: #007bff;
    border: none;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-primary:hover {
    background-color: #0069d9;
  }
</style>
