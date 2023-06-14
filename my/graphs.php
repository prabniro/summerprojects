<?php
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Task and Project Statistics</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div style="width: 400px; height: 300px;">
    <canvas id="chart"></canvas>
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

  <script>
  // Create a bar chart using Chart.js
  var ctx = document.getElementById('chart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Completed Tasks', 'Incomplete Tasks'],
      datasets: [{
        label: 'Number of Completed and Incomplete Tasks',
        data: [<?php echo $completedTaskCount; ?>, <?php echo $incompleteTaskCount; ?>],
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)', // Completed tasks color
          'rgba(255, 99, 132, 0.2)' // Incomplete tasks color
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1
        }
      }
    }
  });
  </script>
</body>
</html>
