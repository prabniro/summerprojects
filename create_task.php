<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the task details from the form submission
  $project_id = $_POST['project_id'];
  $task = $_POST['task'];
  $description = $_POST['description'];
  $status = $_POST['status'];

  // Prepare the INSERT statement
  $query = "INSERT INTO task_list (project_id, task, description, status) VALUES ('$project_id', '$task', '$description', '$status')";

  // Execute the INSERT statement
  if (mysqli_query($conn, $query)) {
    echo "Task created successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  
}
// Retrieve the list of tasks
$taskQuery = "SELECT id, task FROM task_list";
$taskResult = mysqli_query($conn, $taskQuery);

// Retrieve the list of project IDs
$projectQuery = "SELECT id FROM project_list";
$projectResult = mysqli_query($conn, $projectQuery);
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .card {
      background-color: #fff;
      border-radius: 6px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    .form-control textarea {
      height: 100px;
      resize: vertical;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Create Task</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="project_id">Project ID</label>
      <select class="form-control" id="project_id" name="project_id" required>
        <?php
        while ($projectRow = mysqli_fetch_assoc($projectResult)) {
          echo '<option value="' . $projectRow['id'] . '">' . $projectRow['id'] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="task">Task</label>
      <input type="text" class="form-control" id="task" name="task" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="0">Pending</option>
        <option value="1">Started</option>
        <option value="2">Done</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Task</button>
  </form>
</div>

</body>
</html>

<?php include 'viewtask.php'; ?>