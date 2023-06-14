<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $project = $_POST['project'];
  $task = $_POST['task'];
  $user = $_POST['user'];

  // Insert the assignment into the database
  $query = "INSERT INTO assign (project, task, user) VALUES ('$project', '$task', '$user')";
  if (mysqli_query($conn, $query)) {
    echo "Task assigned successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
<html>
  <head>
</head>
<body>
<form method="POST" action="assigntask.php">
  <div class="form-group">
    <label for="project">Project:</label>
    <select class="form-control" id="project" name="project">
      <?php
      // Retrieve the list of projects from the database
      $query = "SELECT id, name FROM project_list";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="task">Task:</label>
    <select class="form-control" id="task" name="task">
      <?php
      // Retrieve the list of tasks from the database
      $query = "SELECT id, task FROM task_list";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['task'] . "</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="user">Assign to:</label>
    <select class="form-control" id="user" name="user">
      <?php
      // Retrieve the list of users from the database
      $query = "SELECT id, firstname, lastname FROM users";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" a href="accepttask.php">Assign Task</button>
  <br/>
  <br/>
  <button>
  <a href="accepttask.php" class="btn btn-primary">Go to Accept Task</a>
      <button>
</form>

    
    </body>
    </html>
<style>
    .form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}

</style>