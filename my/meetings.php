<?php
include_once 'db_connect.php';
if(isset($_POST['submit']))
{    

     $dates = $_POST['dates'];
     $datesone = $_POST['datesone'];
     $dailytopic = $_POST['dailytopic'];
     $dailytopicone = $_POST['dailytopicone'];
     $dailyminutes = $_POST['dailyminutes'];
     $weeklytopic = $_POST['weeklytopic'];
     $weeklytopicone = $_POST['weeklytopicone'];
     $weeklyminutes = $_POST['weeklyminutes'];
    

     $sql = "INSERT INTO  meetings(dates,datesone, dailytopic,  dailytopicone,dailyminutes,	weeklytopic,weeklytopicone,weeklyminutes)
     VALUES ('$dates','$datesone','$dailytopic','$dailytopicone','$dailyminutes','$weeklytopic' , '$weeklytopicone' ,'$weeklyminutes')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

}
else{
  echo "unsucessfull";
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meetings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        main {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            padding: 40px;
        }

        .section {
            background-color: #f1f1f1;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 45%;
        }

        .section h2 {
            font-size: 24px;
            margin: 10px;
            text-align: center;
        }

        .left {
            margin-right: 20px;
        }

        .right {
            margin-left: 20px;
        }

        .left, .right {
            width: 48%;
        }

        form {
            margin: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"], textarea {
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
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
    </style>
</head>
<body>
    <header>
        <h1>Meetings</h1>
    </header>
    <main>
        <section>
            <div>
        <div class="section left">
            <h2>Daily Meetings</h2>
       
      </div>

            <form id="meetings" method="post">
                
                       
            <label for="date-time">Date and Time:</label>
            <input type="date" id="datesone" name="datesone">
                <label for="dailytopic">Topic 1:</label>
                <input type="text" id="dailytopic" name="dailytopic" size="50" >
                <label for="topic-2">Topic 2:</label>
                <input type="text" id="topic-2" name="dailytopicone">
  
           
              
                <label for="minutes-1">Minutes:</label>
                <input type="text" id="minutes" name="dailyminutes" height="10px">
                <button type="submit" id="submit" name="submit" >Share now</button>
            </div>
            </section>
                <section>
                    <div>
                <div class="section left">
                    <h2>Weekly Meetings</h2>
                   
                    </div>
                    <form>
                    <label for="date-time">Date and Time:</label>
                    <input type="datetime-local" id="dates" name="dates">
                        <label for="topic-1">Topic 1:</label>
                        <input type="text" id="topic-1" name="weeklytopic" size="70">
                        <label for="topic-2">Topic 2:</label>
                        <input type="text" id="topic-2" name="weeklytopicone">
                       
                          
                <label for="minutes-1">Minutes:</label>
                     
                        <input type="text" id="minutes" name="weeklyminutes">
                        <button type="submit" id="submit" name="submit">Share now</button>
                    </div>
                    </section>
            </form>
            <br/>
            <br/>
            <br/>
            <section>
            <div>
              
            <a href="meeting.php">View meetings</a>
            <section>
      </div>
        </body>
        </html>
        
        <style>
            body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #088F8F;
  color: white;
  padding: 20px;
  text-align: center;
}

h1 {
  margin: 0;
}

main {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  padding: 40px;
}

.section {
  background-color: #088F8F;
  border-radius: 5px;
  margin-bottom: 20px;
  width: 45%;
}

.section h2 {
  font-size: 24px;
  margin: 10px;
  text-align: center;
}

.left {
  margin-right: 20px;
}

.right {
  margin-left: 20px;
}

.left,
.right {
  width: 48%;
}

form {
  margin: 20px;
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
  width: 100%;
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
   
    </style>