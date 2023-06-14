<?php
include_once 'db_connect.php';

// Fetch data from the database
$sql = "SELECT * FROM meetings";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    $meetings = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $meetings = [];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meetings Data</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(173, 216, 230);
            color: white;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        main {
            padding: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Meetings Data</h1>
    </header>
    <main>
        <?php if (!empty($meetings)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Date and Time</th>
                        <th>Daily Topic 1</th>
                        <th>Daily Topic 2</th>
                        <th>Daily Minutes</th>
                        <th>Weekly Topic 1</th>
                        <th>Weekly Topic 2</th>
                        <th>Weekly Minutes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meetings as $meeting) : ?>
                        <tr>
                            <td><?php echo $meeting['dates']; ?></td>
                            <td><?php echo $meeting['dailytopic']; ?></td>
                            <td><?php echo $meeting['dailytopicone']; ?></td>
                            <td><?php echo $meeting['dailyminutes']; ?></td>
                            <td><?php echo $meeting['weeklytopic']; ?></td>
                            <td><?php echo $meeting['weeklytopicone']; ?></td>
                            <td><?php echo $meeting['weeklyminutes']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No meetings found.</p>
        <?php endif; ?>
    </main>
</body>
</html>
