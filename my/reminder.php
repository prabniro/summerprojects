<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<?php echo $_SESSION['user_id'] ?> 

<?php
include_once 'db_connect.php';

if (isset($_POST['submit'])) {    
    $importanttask = $_POST['importanttask'];
    $reminder = $_POST['reminder'];
    $priority = $_POST['priority'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO todo (importanttask, reminder, priority, user_id)	
            VALUES ('$importanttask', '$reminder', '$priority', '$user_id')";
     
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully!";
    } else {
        echo "Error: " . $sql . " - " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
  echo "Unsuccessful";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Important Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Important Task</h1>
    </header>
    <div class="section-container">
        <section class="section-tasks">
            <form method="post">
                <label for="importanttask">Important Task:</label>
                <input type="text" id="importanttask" name="importanttask">
                <label for="reminder">Reminder:</label>
                <input type="datetime-local" id="reminder" name="reminder">
                <h2>Priority Level</h2>
                <ul id="priority-list">
                    <li>
                        <select name="priority" id="priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </li>
                </ul>
                <button type="submit" name="submit" value="submit">Submit</button>
            </form>
        </section>
    </div>
</body>
</html>
 	<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #088F8F;
}

header {
  background-color: #088F8F;
  color: Black;
  padding: 20px;
  text-align: center;
}

.section-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.section-tasks {
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  width: 400px;
}

.section-tasks h2 {
  margin-top: 0;
}

.section-tasks label {
  display: block;
  margin-bottom: 5px;
}

.section-tasks input[type="text"],
.section-tasks select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.section-tasks button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.section-tasks button:hover {
  background-color: #555;
}

.error-message {
  color: red;
  margin-top: 10px;
}

.success-message {
  color: green;
  margin-top: 10px;
}
</style>