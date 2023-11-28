<?php 
// The Session will start
session_start();
// The connection to database
include 'server_connection/db_conn.php';
// Not displaying errors
ini_set('display_errors', 'Off');
// Admin login authentications
$admin_id = $_SESSION['admin_id'];
// Checker if Admin is Login
if(!isset($admin_id)){
// If not, page will back to Login Page
  header("Location: /login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Approval</title>
  <link rel="stylesheet" href="css/sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
  <nav>
    <ul>
      <li>
        <a href="#" class="logo">
          <img src="Images/res.jpeg">
          <span class="nav-item">GSO 
          </a>
      </li>        
      <li>
        <a href="home.php">
          <i class="fas fa-list"></i>
          <span class="nav-item">Home</span>
          </a>
      </li>
      <li>
        <a href="monitor.php">
          <i class="fas fa-desktop"></i>
          <span class="nav-item">Monitor</span>
          </a>
      </li>
      <li>
        <a href="availableVehicle.php">
          <i class="fas fa-car"></i>
          <span class="nav-item">Vehicle</span>
          </a>
      </li>
      <li>
        <a href="approval.php">
          <i class="fas fa-check"></i>
          <span class="nav-item">Approval</span>
          </a>
      </li>
      <li>
          <a href="Data Analytics.php">
          <i class="fas fa-bar-chart"></i>
          <span class="nav-item">Data Analytics</span>
          </a>
      </li>
      <li>
          <a href="/log-out.php">
          <i class="fas fa-arrow-circle-left"></i>
          <span class="nav-item">Logout</span>
          </a>
      </li>
    </ul>
  </nav>
<section class="main">
      <div class="page">
            <h1>Requests</h1>
      </div>
      <div class="main-content">
        <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>User ID</th>
                <th>Gmail</th>
                <th>Phone Number</th>
                <th>Update</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
            <?php 
                  $query = "SELECT * FROM login WHERE id not in (select id from login where id = 1)";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                  foreach($query_run as $row)
                  {
                  ?>
                 <tr>
                    <td><?= $row['name']; ?></a></td>
                    <td><?= $row['user_id']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['phone_number']; ?></a></td>
                    <td><?= $row['request']; ?></td>
                    <td><button onclick="go()">EDIT</button></a></td>

                  <?php
                    }
                  }else{
                  echo "<h5> No Record Found </h5>";
                  }
                  ?>
            </tbody>
          </table>
      </div>
  </section>
<script>
function go() {
  location.replace("update.php?id=<?= $row['id']; ?>")
}
</script>
</body>
</html>