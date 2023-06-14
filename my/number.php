<!DOCTYPE html>
<html>
<head>
  <title>Task Statistics</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    
    .stat-container {
      display: flex;
      justify-content: space-around;
      margin-top: 50px;
    }
    
    .stat-box {
      background-color: #f1f1f1;
      border-radius: 8px;
      padding: 20px;
    }
    
    .stat-label {
      font-size: 20px;
      color: #333;
    }
    
    .stat-value {
      font-size: 48px;
      font-weight: bold;
      color: #ff6b6b;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="stat-container">
    <div class="stat-box">
      <div class="stat-label">Completed Tasks</div>
      <div class="stat-value"><?php echo $completedTaskCount; ?></div>
    </div>
    <div class="stat-box">
      <div class="stat-label">Incomplete Tasks</div>
      <div class="stat-value"><?php echo $incompleteTaskCount; ?></div>
    </div>
  </div>

  <?php
  // Include the database connection file
  include 'db_connect.php';

  // Retrieve the number of completed tasks
  $queryCompletedTasks = "SELECT COUNT(*) AS completedTaskCount FROM tasks WHERE taskDone = 'yes'";
  $resultCompletedTasks = mysqli_query($conn, $queryCompletedTasks);
  $rowCompletedTasks = mysqli_fetch_assoc($resultCompletedTasks);
  $completedTaskCount = $rowCompletedTasks['completedTaskCount'];

  // Retrieve the number of incomplete tasks
  $queryIncompleteTasks = "SELECT COUNT(*) AS incompleteTaskCount FROM tasks WHERE taskDone = 'no'";
  $resultIncompleteTasks = mysqli_query($conn, $queryIncompleteTasks);
  $rowIncompleteTasks = mysqli_fetch_assoc($resultIncompleteTasks);
  $incompleteTaskCount = $rowIncompleteTasks['incompleteTaskCount'];
  ?>
</body>
</html>
