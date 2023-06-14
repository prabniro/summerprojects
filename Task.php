
<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php
if(isset($_GET['taskID'])){
	
	if(isset($_GET['done'])){
		$conn -> query("update tasks set taskDone='yes' where taskID = '".$_GET['taskID']."'");
	}
	
	if(isset($_GET['delete'])){
		$conn -> query("delete from tasks where taskID = '".$_GET['taskID']."'");
	}
	
	header("location:Task.php");exit();
	
}

?>
<html>
 <head>
    <meta charset="UTF-8" />
    <title> Task Management Tool </title>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Margarine|PT+Sans+Caption|Pacifico|Permanent+Marker" rel="stylesheet">
	<script>
		function showNotes(taskId) {
			var taskNotes = document.getElementById('notes-'+taskId);
			var taskButton = document.getElementById('notesButton-'+taskId)
			if (taskNotes.style.display === "none") {
				taskNotes.style.display = "table-cell";
				taskButton.innerText = 'Hide notes';
			} 
			else {
				taskNotes.style.display = "none";
				taskButton.innerText = 'Show notes';
			}
		}
	</script>
 </head>
 <body>
 <div class = "wrapper">
<?php
	require('HeaderForTask.php');
?>
<div class = "content">
<center> Your current tasks 
<table height = "50" border = "1" class="task">
<tr> <th>Project Name</th> <th>Task Name</th> <th>Start Date</th> <th>Due Date</th> <th>Priority</th> <th>Done</th> <th>Delete</th><th> Edit </th><th> Show Notes </th> </tr>
	<?php
		$sql = "SELECT tasks.*,project.projectName FROM tasks,project WHERE project.projectID = tasks.projectID";
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			$colour = "";
			$date = strtotime($row['taskDueDate']);
			$date = date('Y/m/d',$date);
			$current_date = date("Y/m/d");
			if($row['taskDone'] == "no"){
				if(isset($row['taskDueDate']))
				{ 
					if ($current_date > $date){
						$colour = "#ff6060";
					}
				}
			}
			
			if($row['taskDone']== "yes"){
				if(isset($row['taskDueDate'])){
					if($current_date <= $date){
						$colour = "#60ff6e";
					}
				}
			}
			
			echo "<tr style = 'background-color :", $colour,"'><td>",$row['projectName'], '</td><td>', $row['taskName'], '</td><td>', $row['taskStartDate'], '</td><td>', $row['taskDueDate'], '</td><td>', $row['taskPriority'], '</td>',"
			<td><a class = 'table1' href='Task.php?done=1&taskID=",$row["taskID"],"'>&#10004</a></td>
			<td><a class = 'table1' href='Task.php?delete=1&taskID=",$row["taskID"],"'>&#10006</a></td>
			<td><a class = 'table1' href='EditTask.php?edit=1&taskID=",$row["taskID"],"'>Edit</a></td>
			<td> <button id='notesButton-",$row['taskID'],"' onClick =\"showNotes('",$row['taskID'],"')\"'>Show Notes </button> </td>
			</tr>
			<tr class='notes'>
			<td colspan=\"8\" style='display:none;' id='notes-",$row['taskID'],"'><hr>",$row['notes'],"<hr></td>
			</tr>";	
		}
	?>
</table>
</center>
	
	
<br> 
	
<form action="newTask.php" method="POST">
	<input type="text" required name="taskName" placeholder="Task Name here">
	<input type="date" required name="taskSDate" placeholder="Task Start Date here">
	<input type="date" required name="taskDDate" placeholder="Task Due Date here">
	<select  required name="priority">
		<option value="">Select Priority</option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
	</select>
	<select required name="ProjectId"> 
		<option value=""> Select project </option>
			<?php
				$sql = "SELECT * FROM project";
				$result = $conn ->query($sql);
				while($row = $result ->fetch_assoc()){
					echo '<option value ="',$row['projectID'],'">',$row['projectName'],'</option>';
				}
			?>
		</select>
		<br>
		<textarea type="text" rows='10' cols='80' name = "taskNotes" placeholder="Notes Here"></textarea>
		<br>
		<input type="submit" name="newTask">
		
</form>

</div>
	
</div>
</body>
</html>
<style>
	/* CSS for Card Layout */

.wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.card {
  background-color: #f8f8f8;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 600px;
  width: 100%;
}

.card h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.task {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 10px;
}

.task th,
.task td {
  padding: 10px;
  text-align: left;
}

.task th {
  background-color: #f0f0f0;
}

.task td {
  border-bottom: 1px solid #ddd;
}

.task tr:last-child td {
  border-bottom: none;
}

.notes {
  background-color: #f8f8f8;
}

form {
  margin-top: 10px;
}

form input,
form select {
  margin-bottom: 10px;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  width: 100%;
}

form input[type="submit"] {
  background-color: #4caf50;
  color: #fff;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #45a049;
}
</style>


 
 
