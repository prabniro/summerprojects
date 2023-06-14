<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the project ID from the form submission
  $project_id = $_POST['project_id'];

  // Prepare the DELETE statement
  $query = "DELETE FROM project_list WHERE id = '$project_id'";

  // Execute the DELETE statement
  if (mysqli_query($conn, $query)) {
    echo "Project deleted successfully.";
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
  <title>Delete Project</title>
</head>

<body>
  <h2>Delete Project</h2>
  Verify once more
  <form method="POST" action="">
    <div class="mb-3">
      <label for="project_id" class="form-label">Project ID</label>
      <input type="text" class="form-control" id="project_id" name="project_id" required>
    </div>
    <button type="submit" class="btn btn-danger">Delete Project</button>
  </form>
</body>

</html>
