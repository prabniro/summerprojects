<!DOCTYPE html>
<html>
<head>
  <title>Project Management System</title>
  <style>
    /* Custom CSS code */
    body {
      background-color: #f8f9fa; /* Set a light background color */
    }

    header {
      background-color: #e9ecef; /* Set a light header background color */
      padding: 20px;
      text-align: center;
    }

    .container {
      margin-top: 20px;
    }

    .table {
      background-color: #fff; /* Set a white background for tables */
    }

    .footer {
      background-color: #e9ecef; /* Set a light footer background color */
      padding: 10px;
      text-align: center;
    }

    /* Card layout CSS */
    .card {
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-body {
      color: #333;
    }

    .card-link {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    .card-link:hover {
      color: #0056b3;
    }

    .card-footer {
      background-color: #f8f9fa;
      padding: 10px;
      text-align: center;
    }

    /* Additional CSS for an impressive dashboard */
    .sidebar .logo-details i {
      transition: all 0.3s ease;
    }

    .sidebar.active .logo-details i {
      font-size: 24px;
    }

    .sidebar.active .nav-links li a {
      display: flex;
      justify-content: center;
    }

    .sidebar.active .nav-links li i {
      font-size: 24px;
      margin-right: 0;
    }

    .home-section .home-content .overview-boxes .box {
      position: relative;
      overflow: hidden;
    }

    .home-section .home-content .overview-boxes .box::before {
      content: '';
      position: absolute;
      top: -10px;
      left: -10px;
      width: calc(100% + 20px);
      height: calc(100% + 20px);
      border-radius: 12px;
      background: linear-gradient(45deg, #008aff, #00ffe7);
      z-index: -1;
      opacity: 0;
      transition: all 0.3s ease;
    }

    .home-section .home-content .overview-boxes .box:hover::before {
      top: -15px;
      left: -15px;
      opacity: 1;
    }

    .home-section .home-content .overview-boxes .box .number {
      transition: all 0.3s ease;
    }

    .home-section .home-content .overview-boxes .box:hover .number {
      transform: translateY(-10px);
    }

    .home-section .home-content .sales-boxes .box .button a:hover {
      background: #081d45;
    }

    @media (max-width: 700px) {
      .home-content .sales-boxes .sales-details {
        width: 100%;
        overflow-x: auto;
      }
    }

    @media (max-width: 550px) {
      .overview-boxes .box {
        margin-bottom: 20px;
      }
    }

    @media (max-width: 400px) {
      .home-section {
        padding-top: 154px;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Project Management System</h1>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Project Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Members</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reports</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="main container">
    <div class="row">
      <div class="col-md-6">
        <h2>Project List</h2>
        <?php
          // Include the database connection file
          include 'db_connect.php';

          // Perform database query to fetch project list
          $query = "SELECT * FROM project_list";
          $result = mysqli_query($conn, $query);
        ?>

        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Status</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Manager ID</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['manager_id']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h2>Add New Project</h2>
        <?php include 'create_project.php'; ?>
      </div>
    </div>
  </section>

  <footer class="footer">
    &copy; 2023 Project Management System. All rights reserved.
  </footer>
</body>
</html>
