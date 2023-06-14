<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the progress details from the form submission
  $project_id = $_POST['project_id'];
  $task_id = $_POST['task_id'];
  $comment = $_POST['comment'];
  $subject = $_POST['subject'];
  $status = $_POST['status'];
  $date = $_POST['date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $user_id = $_POST['user_id'];
  $time_rendered = $_POST['time_rendered'];

  // Prepare the INSERT statement
  $query = "INSERT INTO user_productivity (project_id, task_id, comment, subject, status, date, start_time, end_time, user_id, time_rendered) VALUES ('$project_id', '$task_id', '$comment', '$subject', '$status', '$date', '$start_time', '$end_time', '$user_id', '$time_rendered')";

  // Execute the INSERT statement
  if (mysqli_query($conn, $query)) {
    echo "Progress saved successfully.";
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

// Retrieve managers from the users table
$manager_query = "SELECT id, firstname, lastname FROM users WHERE type = 1";
$manager_result = mysqli_query($conn, $manager_query);
$managers = mysqli_fetch_all($manager_result, MYSQLI_ASSOC);

// Retrieve managers from the users table
$manager_query = "SELECT id, firstname, lastname FROM users WHERE type = 1";
$manager_result = mysqli_query($conn, $manager_query);
$managers = mysqli_fetch_all($manager_result, MYSQLI_ASSOC);

// Retrieve users from the users table
$user_query = "SELECT id, firstname, lastname FROM users";
$user_result = mysqli_query($conn, $user_query);
$users = mysqli_fetch_all($user_result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Progress</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }

    .card {
      background-color: #fff;
      border-radius: 6px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
    }

    h1 {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    select,
    textarea,
    input[type="date"],
    input[type="time"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    button[type="submit"] {
      background-color: #007bff;
      border: none;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>
</head>

<body>
  <div class="card">
    <h1>Manage Progress</h1>

    <form action="save_progress.php" method="POST">
      <div>
          <label for="project_id">Project ID</label>
      <select class="form-control" id="project_id" name="project_id" required>
        <?php
        while ($projectRow = mysqli_fetch_assoc($projectResult)) {
          echo '<option value="' . $projectRow['id'] . '">' . $projectRow['id'] . '</option>';
        }
        ?>
      </select>
      </div>
      <div>
        <label for="task_id">Task ID:</label>
        <select id="task_id" name="task_id" required>
          <option value="">Select Task ID</option>
          <?php
          while ($taskRow = mysqli_fetch_assoc($taskResult)) {
            echo '<option value="' . $taskRow['id'] . '">' . $taskRow['id'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div>
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" required></textarea>
      </div>
      <div>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
      </div>
      
      <div>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div>
        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time" name="start_time" required>
      </div>
      <div>
        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" required>
      </div>
      <div>
        <label for="user_id">User ID:</label>
        <select id="user_id" name="user_id" required>
          <option value="">Select User ID</option>
          <?php
          foreach ($users as $user) {
            echo '<option value="' . $user['id'] . '">' . $user['id'] . '</option>';
          }
          ?>
        </select>
      </div>

      <button type="submit">Save Progress</button>
    </form>
  </div>

  <script src="js/scripts.js"></script>
</body>

</html>
