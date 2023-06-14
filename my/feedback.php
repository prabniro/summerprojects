<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
include_once 'db_connect.php';
if(isset($_POST['submit']))
{    
   
     $name = $_POST['name'];
     $department = $_POST['department'];
     $feedbacktype = $_POST['feedbacktype'];
     $feedbackreason = $_POST['feedbackreason'];
     $rating = $_POST['rating'];
     $feedbackcomment = $_POST['feedbackcomment'];
     $sql = "INSERT INTO  feedback_system ( name, department, feedbacktype, feedbackreason, rating, feedbackcomment )
     VALUES ('$name','$department','$feedbacktype','$feedbackreason','$rating','$feedbackcomment')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

}

?>
                
 

<!DOCTYPE html>
<html>
  <head>
    <title>Give Feedback</title>
    <style>
      /* Basic styling for the page */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: rgb(173,216,230);
      }
      .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"], select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
      }
      select {
        height: 40px;
      }
      textarea {
        height: 100px;
      }
      input[type="submit"] {
        background-color: red;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
      body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		.rating {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}
		.star {
			font-size: 2em;
			color: #ccc;
			cursor: pointer;
			transition: color 0.2s;
		}
		.star:hover,
		.star.active {
			color: #ffbf00;
		}
		#rating-value {
			margin-top: 10px;
			font-size: 1.5em;
			text-align: center;
		}
    </style>
       <script>
      // Function to handle form submission
      function submitFeedback(event) {
        event.preventDefault();
        // Get form data
        const formData = new FormData(event.target);
        const name = formData.get('name');
        const department = formData.get('department');
        const feedbacktype = formData.get('feedbacktype');
        const feedbackomment = formData.get('feedbackcomment');
        // Do something with form data (e.g. send to server)
        console.log(name, department, feedbacktype, feedbackcomment);
        // Reset form
        event.target.reset();
      }
      // Add event listener to form submit button
      const form = document.getElementById('feedbackform');
      form.addEventListener('submit', submitFeedback);


    </script>
  </head>
  <body>
    
    <div class="container">
      <h1>Give Feedback</h1>
      <form method="post" action="">
        <label for="name">Employee Name</label>
        <input type="text" id="name" name="name" required>
		<label for="department">Reason for feedback</label>
        <select id="department" name="department" required>
            <option value="">Select Department</option>
            <option value="IT">IT</option>
            <option value="HR">HR</option>
            <option value="Finance">Finance</option>
            <option value="Business Development">Business Development</option>
            <option value="Marketing">Marketing</option>
            <option value="General">General</option>
          </select>
        <label for="feedbacktype">Type of Feedback</label>
        <select id="feedbacktype" name="feedbacktype" required>
          <option value="">Select feedback type</option>
          <option value="positive">Positive</option>
          <option value="negative">Negative</option>
        </select>
        <label for="feedbackreason">Reason for feedback</label>
        <select id="feedbackreason" name="feedbackreason" required>
          <option value="positive">good in team work</option>
          <option value="positive">Friendly behaviour with colleagues</option>
          <option value="positive">punctuality on work</option>
          <option value="negative">not serious on work</option>
          <option value="negative">bad behaviour in work</option>
          <option value="negative">doesnot complete task on time</option>
        </select>
        <h3>OR</h3>
      
      
      <label for="feedbackcomment">Comment</label>
        <textarea id="feedbackcomment" name="feedbackcomment" required></textarea>
        <h1>Rating System</h1>
	<div class="rating">
		<span class="star" onclick="setRating(1)">★</span>
		<span class="star" onclick="setRating(2)">★</span>
		<span class="star" onclick="setRating(3)">★</span>
		<span class="star" onclick="setRating(4)">★</span>
		<span class="star" onclick="setRating(5)">★</span>
	</div>
	<input type="text" id="rating-input" name="rating" readonly>

        <input type="submit" value="submit" name="submit" onclick="FormData(event.target)" >
      </form> 
    </div>
	<br/>
	<br/>
	<br/>
	<?php

echo $_SESSION['user_id'];
if ($_SESSION['user_id'] == 4) {
    echo '<button><a href="displayfeedback.php">Display Feedback</a></button>';
}
?>

  </body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		input[type="text"],
		textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
			resize: vertical;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
			font-size: 0.8em;
			margin-top: 5px;
		}
	</style>
<!DOCTYPE html>
<html>
<head>
	<title>Rating System</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		.rating {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}
		.star {
			font-size: 2em;
			color: #ccc;
			cursor: pointer;
			transition: color 0.2s;
		}
		.star:hover,
		.star.active {
			color: #ffbf00;
		}
		#rating-value {
			margin-top: 10px;
			font-size: 1.5em;
			text-align: center;
		}
		#rating-input {
			display: block;
			margin: 10px auto;
			padding: 10px;
			width: 50px;
			text-align: center;
			font-size: 1.2em;
		}
	</style>
</head>
<body>
	
	<script>
		var stars = document.getElementsByClassName('star');
		var ratingInput = document.getElementById('rating-input');

		function setRating(rating) {
			// Remove active class from all stars
			for (var i = 0; i < stars.length; i++) {
				stars[i].classList.remove('active');
			}

			// Add active class to selected stars
			for (var i = 0; i < rating; i++) {
				stars[i].classList.add('active');
			}

			// Update rating input value
			ratingInput.value = rating;

			// TODO: Submit rating to server
		}
	</script>
</body>
</html>
