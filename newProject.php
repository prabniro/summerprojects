<?php
//include auth_session.php file on all user panel pages
include("../my/auth_session.php");
?>
<?php include('databaseConnect.php') ?>

<?php 
	if(isset($_POST['createProject'])){
		$projectName = $_POST['projectName'];
	
		$id = $_SESSION['user_id'];
	
		//validate and insert into database.
		$sql = "INSERT into project (projectName, user_id) VALUES ('" . $_POST['projectName'] . "', " . $_SESSION['user_id'] . ")";

		$sql = "INSERT INTO  project( projectName,	user_id)	
		VALUES ('$projectName','$id')";
		if ($conn->query($sql) == TRUE) 
		{
			echo "New record created successfully";
		} 
		
		else 
		{
			echo "Error creating record: " . $conn->error;
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

			
		header("location:Projects.php");
		exit();
	}
 ?>
 
 	
