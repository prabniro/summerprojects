<!DOCTYPE html>
<html>
<head>
  <title>Task and Project Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 400px; height: 300px;">
  <canvas id="myChart"></canvas>

  <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tasks', 'Projects'],
      datasets: [{
        label: 'Number of Tasks and Projects',
        data: [
          <?php
         include 'db_connect.php';
          // Retrieve the number of tasks
          $taskCount = $conn->query("SELECT COUNT(*) AS taskCount FROM tms_db.task_list")->fetch_assoc()['taskCount'];

          // Retrieve the number of projects
          $projectCount = $conn->query("SELECT COUNT(*) AS projectCount FROM tms_db.project_list")->fetch_assoc()['projectCount'];

          $conn->close();

          echo $taskCount . ', ' . $projectCount;
          ?>
        ],
        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
        borderWidth: 1
      }]
    },
    options: {
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
