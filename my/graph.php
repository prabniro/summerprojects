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

  // Retrieve the number of tasks
  $queryTasks = "SELECT COUNT(*) AS taskCount FROM tasks";
  $resultTasks = mysqli_query($conn, $queryTasks);
  $rowTasks = mysqli_fetch_assoc($resultTasks);
  $taskCount = $rowTasks['taskCount'];

  // Retrieve the number of projects
  $queryProjects = "SELECT COUNT(*) AS projectCount FROM project";
  $resultProjects = mysqli_query($conn, $queryProjects);
  $rowProjects = mysqli_fetch_assoc($resultProjects);
  $projectCount = $rowProjects['projectCount'];
  ?>

  <script>
  // Create a bar chart using Chart.js
  var ctx = document.getElementById('chart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tasks', 'Projects'],
      datasets: [{
        label: 'Number of Tasks and Projects',
        data: [<?php echo $taskCount; ?>, <?php echo $projectCount; ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)', // Tasks color
          'rgba(54, 162, 235, 0.2)' // Projects color
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)'
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
