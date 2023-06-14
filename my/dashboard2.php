<?php
include("db_connect.php");
?>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Office Management System</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  
</head>
<body>
   <?php echo $_SESSION['user_id'] ?> 
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="logo.jpeg">
          <span class="nav-item">Welcome</span>
        </a></li>
        <li><a href="#">
        <i class="fa-solid fa-gauge fa-2xl"></i>
        <a href="../maintask/dash.php"><span class="nav-item">Project Manager</a></span>
        </a></li>
        <br/>
        <li><a href="#">
        <i class="fa-solid fa-list-check"></i>
        <a href="../TaskManager/index.php"><span class="nav-item">Task Manager</span>
        </a></li>
        <br/>
        <li><a href="#">
        <i class="fa-solid fa-check fa-2xl"></i>
        <a href="todo.php"><span class="nav-item">Todo Section</span>
        </a></li>
        <br/>
        <li><a href="#">
        <i class="fa fa-handshake fa-2xl"></i>
        <a href="meetings.php"><span class="nav-item">Meetings</span>
        </a></li>
        <br/>
        <li><a href="#">
        <i class="fa-solid fa-comment-dots fa-2xl"></i>
        <a href="Feedback.php"><span class="nav-item">Feedback</span>
        </a></li>
        <br/>
        <li><a href="#">
        <i class="fa-brands fa-discord fa-2xl"></i>
        <a href="publicdiscussion.php"><span class="nav-item">Public Discussion</span>
        </a></li>
    <br/>
        
        <li><a href="#">
        <i class="fa-solid fa-gear fa-2xl"></i>
        <a href="settings.php"><span class="nav-item">Settings</span>
        </a></li>
      <br/>
        <li><a href="#" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <a href="logout.php"> <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>


    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
        
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
          
        <?php include 'graph.php'; ?>
        
      <section class="attendance">
      
        <div >
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

         
        </div>
        
        <?php include 'number.php'; ?>

        </section>
    
        </div>
      
        <div class="card2">
          <h4>Notification and Discussion</h4>
            <div class="card2-list">
           <table class="table">
            <thread>
              <tr>
                <th>Title </th>
                <th>Content</th>
              </tr>
              
            </thread>
            <tbody>
            <?php
		$sql = "SELECT * FROM publicdiscussion";
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			echo "<tr><td>",$row['posttitle'], '</td><td>', $row['postcontent'],  "</td>
    
			</tr>";
      
		}

?>
          </table>
            </div>
          
        </div>
      </div>
      <section>
      <section class="Reminder">
        <div class="Reminder-list">
        <h1>Task manager</h1>
        <table class="table">
            <thead>

              <tr>
           
                <th>Project ID </th>
                <th>Project Name</th>

                <th>Priority</th>
               
              </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT * FROM project where user_id=" . $_SESSION['user_id'] ;
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>", $row['projectID'], '</td><td>', $row['projectName'], '</td><td>', $row['projectPrio'], "</td></tr>";
}

?>
 
     

           </thead>
          </table>
        </section>
      </section>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Todo list</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Project</th>
                <th>Task</th>
                <th>Todo</th>
                <th>Doing</th>
                <th>Done</th>
               
              </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT * FROM todo where user_id=".$_SESSION['user_id'];
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>", $row['project'], '</td><td>', $row['task'], '</td><td>', $row['todo'], '</td><td>', $row['doing'], '</td><td>', $row['done'], "</td></tr>";
    }
}
?>

           </thread>
          </table>
        </div>
        </section>
        <section class="attendance">
        <div class="attendance-list">
          <h1>Task Priority</h1>
          <table class="table">
            <thead>
                      <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>priority</th>
                       
        
                      </tr>
                    </thead>
                    <tbody>

                    <?php
		$sql = "SELECT * FROM todo where user_id=".$_SESSION['user_id'];
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			echo "<tr><td>",$row['importanttask'], '</td><td>', $row['reminder'], '</td><td>', $row['priority'],"</td>
	
			</tr>";
		}

?>
    
    </tbody>
          </table>
        </div>
      </section>


</body>
</html>
<html>

    <style>
/*  import google fonts */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: 	rgb(173,216,230)
}
nav{
  position: sticky;
  top: 0;
  bottom: 0;
  height: 108vh;
  left: 0;
  width: 100px;
  /* width: 280px; */
  background: #fff;
  overflow: hidden;
  transition: 1s;
}
nav:hover{
  width: 280px;
  transition: 1s;
}
.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
  padding-bottom: 3rem;
}

.logo img{
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
  text-transform: uppercase;
}
a{
  position: relative;
  width: 280px;
  font-size: 14px;
  color: rgb(85, 83, 83);
  display: table;
  padding: 10px;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 20px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
}
a:hover{
  background: #eee;
}
a:hover i{
  color: #34AF6D;
  transition: 0.5s;
}
.logout{
  position: absolute;
  bottom: 0;
}

.container{
  display: flex;
}

/* MAin Section */
.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main .users{
  display: flex;
  width: 100%;
 max-height: fit-content; height: 80%;
  
}
.users .card{
  width: 60%;
  margin: 10px;
  height: 70%;
  background: #fff;
  text-align: center;
  border-radius: 30px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
 .card2{
  width: 40%;
  height: 70%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 30px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}

.users .card img{
  width: 70px;
  height: 70px;
  border-radius: 50%;
}
.users .card h4{
  text-transform: uppercase;
}
.users .card p{
  font-size: 12px;
  margin-bottom: 15px;
  text-transform: uppercase;
}
.card2.card2-list{
  border-top: 1px dashed red;
}


.users table{
  margin:  auto;
}
.users .per span{
  padding: 5px;
  border-radius: 10px;
  background: rgb(223, 223, 223);
}
.users td{
  font-size: 14px;
  padding-right: 15px;
}
.users .card button{
  width: 100%;
  margin-top: 8px;
  padding: 7px;
  cursor: pointer;
  border-radius: 10px;
  background: transparent;
  border: 1px solid #4AD489;
}
.users .card button:hover{
  background: #4AD489;
  color: #fff;
  transition: 0.5s;
}

/*Attendance List serction  */
.attendance{
  margin-top: 20px;
  text-transform: capitalize;
 
}
.attendance-list{
  width: 70%;
  padding: 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  min-width: 100%;
  overflow: visible;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #fff;
  background: #34AF6D;
  text-align: left;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table tbody tr.active{
  font-weight: bold;
  color: #4AD489;
}
.table tbody tr:last-of-type{
  border-bottom: 2px solid #4AD489;
}
.table button{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #4AD489;
}
.table button:hover{
  background: #4AD489;
  color: #fff;
  transition: 0.5rem;
}
/*Reminder section  */
.Reminder{
  margin-top: 20px;
  text-transform: capitalize;

 
}
.Reminder-list{
  width: 70%;
  padding: 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  min-width: 100%;
  overflow: hidden;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #fff;
  background: #34AF6D;
  text-align: left;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table tbody tr.active{
  font-weight: bold;
  color: #4AD489;
}
.table tbody tr:last-of-type{
  border-bottom: 2px solid #4AD489;
}
.table button{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #4AD489;
}
.table button:hover{
  background: #4AD489;
  color: #fff;
  transition: 0.5rem;
}
</style>
</html>