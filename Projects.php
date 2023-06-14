
<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php
if(isset($_GET['projectID'])){
	
	if(isset($_GET['done'])){
		$conn -> query("update project set done='yes' where projectID = '".$_GET['projectID']."'");
	}
	
	if(isset($_GET['delete'])){
		$conn -> query("delete from project where projectID = '".$_GET['projectID']."'");
	}
	
	header("location:Projects.php");exit();
	
}

?>

<html>
 <head>
    <meta charset="UTF-8" />
    <title> Task Management Tool </title>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Margarine|PT+Sans+Caption|Pacifico|Permanent+Marker" rel="stylesheet">
 </head>
 <body>
 <div class = "wrapper">
<?php
	require('HeaderForTask.php');
?>
<div class = "content">
<center> All projects 
<table height = "50" border = "1" class="projects">
<tr> <th>Project Name</th> <th>Project Priority</th> <th>Delete</th> <th>Edit</th>  </th></tr>
	<?php
		$sql = "SELECT * FROM project";
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			echo "<tr><td>",$row['projectName'], '</td><td>', $row['projectPrio'], "</td>
			<td><a href='Projects.php?delete=1&projectID=",$row["projectID"],"'>&#10006</a></td>
			<td><a href='EditProject.php?edit=1&projectID=",$row["projectID"],"'>Edit</a></td>
			</tr>";
		}

?>
</table>
</center>
	
<br> 

<form action="newProject.php" method="POST">
	<input type="text" required name="projectName" placeholder="Project Name here">
	<select  required name="priority">
		<option value="">Select Priority</option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
	</select>
	<input type="submit" name="createProject">
		
</form>
</div>
</div>
</body>
</html>
	
 
<style>
/* CSS code */

/* Styling the table */
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

.projects {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 10px;
}

.projects th,
.projects td {
  padding: 10px;
  text-align: left;
}

.projects th {
  background-color: #f0f0f0;
}

.projects td {
  border-bottom: 1px solid #ddd;
}

.projects tr:last-child td {
  border-bottom: none;
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