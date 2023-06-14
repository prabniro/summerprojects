<!DOCTYPE html>
<html>
<head>
    <title>Feedback Data</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(173, 216, 230);
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback Data</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Feedback Type</th>
                <th>Feedback Reason</th>
                <th>Rating</th>
                <th>Feedback Comment</th>
            </tr>
            <?php
            include_once 'db_connect.php';
            
            // Fetch data from the database table
            $sql = "SELECT * FROM feedback_system";
            $result = mysqli_query($conn, $sql);
            
            // Iterate over the fetched records and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['feedbacktype'] . "</td>";
                echo "<td>" . $row['feedbackreason'] . "</td>";
                echo "<td>" . $row['rating'] . "</td>";
                echo "<td>" . $row['feedbackcomment'] . "</td>";
                echo "</tr>";
            }
            
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
