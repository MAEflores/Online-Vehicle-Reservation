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
  <title>Available Vehicle</title>
  <link rel="stylesheet" href="css/sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


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
            <h1>Available Vehicle
          <table class="table">
            <thead>
              <tr>
                <th>Hiace</th>
                <th>Hilux</th>
                <th>Isuzu</th>
                <th>Multi</th>
                <th>Jinbie</th>
                <th>Foton</th>
                <th>Tornado</th>
                <th>Commuter</th>
                <th>Innova</th>
                <th>Update</th>

              </tr>
            </thead>
            <tbody>
                    <?php
                    $query = "SELECT * FROM available";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_fetch_assoc($query_run) > 0)
                    {
                    foreach($query_run as $row)
                    {
                    ?>
                  <tr>
                    <td><?=$row['Hiace'];?></a></td>
                    <td><?=$row['Hilux'];?></td>
                    <td><?=$row['Isuzu'];?></td>
                    <td><?=$row['Multi'];?></a></td>
                    <td><?=$row['Jinbie'];?></td>
                    <td><?=$row['Foton'];?></td>
                    <td><?=$row['Tornado'];?></td>
                    <td><?=$row['Commuter'];?></td>
                    <td><?=$row['Innova'];?></td>
                    <td><button onClick="go()">Update</button></td>
                  </tr>
                    <?php
                    }
                  }
              else
              {
                  echo "<h5> No Available Vehicle </h5>";
              }
              ?>
            </tbody>
          </table>
          <script>
    function go() {
      location.replace("updateAvail.php?id=<?=$row['id'];?>")
    }
    </script>

            </h1>
      </div>
      
  </section>
</body>
</html>