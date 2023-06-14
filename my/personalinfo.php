<?php
include_once 'db_connect.php';
if(isset($_POST['submit']))
{    
   
     $code = $_POST['code'];
     $name = $_POST['name'];
     $dob = $_POST['dob'];
     $department = $_POST['department'];
     $joiningdate = $_POST['joiningdate'];
     
     $sql = "INSERT INTO  personalinfo ( code, name, dob, department, joiningdate)
     VALUES ('$code','$name','$dob','$department','$joiningdate')";
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
<html>
<head>
  <title>Personal Information</title>
  <!-- Add Bootstrap CSS CDN link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    /* Custom CSS */
    body {
      background-color: #f8f8f8;
    }

    .card {
      background-color: cream;
      max-width: 500px;
      margin: 0 auto;
      margin-top: 50px;
      padding: 20px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h3 class="card-title text-center">Personal Information</h3>
      <form method="post" action="">
        <form id="personal-info-form" >
      
        <div class="mb-3">
          <label for="personal-code" class="form-label">Personal Code:</label>
          <input type="text" class="form-control" name= "code" id="personal-code" readonly>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
          <label for="date-of-birth" class="form-label">Date of Birth:</label>
          <input type="date" class="form-control" name="dob" id="date-of-birth" required>
        </div>
        <div class="mb-3">
          <label for="department" class="form-label">Department:</label>
          <select class="form-control" id="department" name="department" required>
            <option value="">Select Department</option>
            <option value="IT">IT</option>
            <option value="HR">HR</option>
            <option value="Finance">Finance</option>
            <option value="Business Development">Business Development</option>
            <option value="Marketing">Marketing</option>
            <option value="General">General</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="joining-date" class="form-label">Joining Date:</label>
          <input type="date" class="form-control" name="joiningdate" id="joining-date" required>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Bootstrap JS CDN link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript code to generate personal code
    function generatePersonalCode() {
      var currentDate = new Date();
      var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
      var year = currentDate.getFullYear().toString().substr(-2);
      var randomDigits = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
      var personalCode = month + year + randomDigits;
      return personalCode;
    }

    // Set initial personal code
    var personalCodeInput = document.getElementById("personal-code");
    personalCodeInput.value = generatePersonalCode();

    // JavaScript code to handle form submission
    document.getElementById("personal-info-form").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      // Get form values
      var personalCode = personalCodeInput.value;
      var name = document.getElementById("name").value;
      var dateOfBirth = document.getElementById("date-of-birth").value;
      var department = document.getElementById("department").value;
      var joiningDate = document.getElementById("joining-date").value;

      // Do something with the form values (e.g., send them to a server, perform validation, etc.)
      console.log("Personal Code: ", personalCode);
      console.log("Name: ", name);
      console.log("Date of Birth: ", dateOfBirth);
      console.log("Department: ", department);
      console.log("Joining Date: ", joiningDate);
    });
  </script>
</body>
</html>
