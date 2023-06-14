<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the form is for changing the task status
  if (isset($_POST['task_id']) && isset($_POST['status'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];

    // Prepare the UPDATE statement
    $query = "UPDATE task_list SET status = '$status' WHERE id = '$task_id'";

    // Execute the UPDATE statement
    if (mysqli_query($conn, $query)) {
      echo "Task status updated successfully.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}
?>
<html>
    <body>
  <div class="card">
    <h2>Change Task Status</h2>
    <form action="" method="POST">
      <div>
        <label for="task_id">Task ID:</label>
        <select id="task_id" name="task_id" required>
          <option value="">Select Task ID</option>
          <?php
          $taskQuery = "SELECT id, task FROM task_list";
          $taskResult = mysqli_query($conn, $taskQuery);

          while ($taskRow = mysqli_fetch_assoc($taskResult)) {
            echo '<option value="' . $taskRow['id'] . '">' . $taskRow['id'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
          <option value="">Select Status</option>
          <option value="0">Pending</option>
          <option value="1">Started</option>
          <option value="2">On-Progress</option>
          <option value="3">Done</option>
        </select>
      </div>
      <button type="submit">Change Status</button>
    </form>
  </div>

  <script src="js/scripts.js"></script>
</body>

</html>