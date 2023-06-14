<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the progress details from the form submission
    $project_id = $_POST['project_id'];
    $task_id = $_POST['task_id'];
    $comment = $_POST['comment'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = $_POST['user_id'];
   

    // Prepare the INSERT statement
    $query = "INSERT INTO user_productivity (project_id, task_id, comment, subject, date, start_time, end_time, user_id ) 
              VALUES ('$project_id', '$task_id', '$comment', '$subject', '$date', '$start_time', '$end_time', '$user_id')";

    // Execute the INSERT statement
    if (mysqli_query($conn, $query)) {
        echo "Progress saved successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
