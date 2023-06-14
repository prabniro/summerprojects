<?php
include("db_connect.php");
?>
<?php
include_once 'db_connect.php';
if(isset($_POST['submit']))
{    

     $posttitle = $_POST['posttitle'];
     $postcontent = $_POST['postcontent'];


     $sql = "INSERT INTO  publicdiscussion(posttitle,	postcontent)
     VALUES ('$posttitle','$postcontent')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
  

}
else{
  echo "unsucessfull";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Discussion Forum</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Public discussion</h1>
	</header>
	<main>
		<section>
			<h2>Create a new post:</h2>
			<form id="new-post-form" method="post">
				<label for="post-title">Title:</label>
				<input type="text" id="posttitle" name="posttitle">
				<label for="post-content">Content:</label>
				<textarea id="postcontent" name="postcontent"></textarea>
				<button type="submit" name="submit" id="submit">Share now</button>
			</form>
		</section>

    <h2>New Posts:</h2>
    <?php
    $sql = "SELECT * FROM publicdiscussion,personalinfo";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h3 class='post-title'>" . $row["posttitle"] . "</h3>";
        echo "<p class='post-content'>" . $row["postcontent"] . "</p>";
        echo "<p class='post-date'>" . date("Y/m/d") . "</p>";
        echo"By:";
        echo $row["name"];
        echo "</div>";
    }
 

    $conn->close();
    ?>
</section>
			</form>
		</section>
	</main>
</body>
</html>


<style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5FBFF;
        }

        header {
            background-color: #088F8F;
            color: 	#90EE90;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        main {
            padding: 40px;
        }

        section {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            margin-bottom: 10px;
            padding: 5px;
            width: 30%;
        }

        button {
            background-color: #333;
            border: none;
            border-radius: 3px;
            color: white;
            cursor: pointer;
            font-size: 18px;
            margin-top: 10px;
            padding: 10px 20px;
        }

        button:hover {
            background-color: #555;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post-title {
            font-size: 24px;
            margin: 0;
            margin-bottom: 10px;
        }

        .post-content {
            margin: 0;
        }

        .post-date {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }
    </style>
<style>
   section {
  margin-top: 20px;
}

h2 {
  margin-bottom: 10px;
}

ul#post-list {
  list-style: none;
  padding: 0;
}

.card {
  background-color: #f9f9f9;
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card h3 {
  margin-top: 0;
}

.card p {
  margin-bottom: 5px;
}

.card p:first-child {
  font-weight: bold;
}

.card p:last-child {
  font-size: 14px;
  color: #888;
}

</style>





       