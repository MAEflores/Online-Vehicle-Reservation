<?php 
session_start();
ini_set('display_errors', 'Off');
include 'server_connection/db_conn.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($con, "SELECT * FROM login WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
  }
  else{
    header("Location: /login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Request</title>
  <link rel="stylesheet" href="sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>



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
          <a href="Profile.php">
            <i class="fas fa-user"></i>
            <span class="nav-item">My Account</span>
          </a>
        </li>
        <li>
          <a href="Form.php">
            <i class="fas fa-fill-drip"></i>
            <span class="nav-item">Form</span>
          </a>
        </li>
        <li>
          <a href="Form-edit.php">
            <i class="fas fa-edit"></i>
            <span class="nav-item">Edit</span>
          </a>
        </li>
        <li>
          <a href="Request.php">
            <i class="fas fa-paper-plane"></i>
            <span class="nav-item">Request</span>
          </a>
        </li>
        <li>
          <a href="Data Analytics.php">
            <i class="fas fa-eye"></i>
            <span class="nav-item">Analytics</span>
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
                    <h1>Request Result</h1>
              </div>
      <div class="main-content">
        <table class="table">
            <thead>
              <tr>
                   
                    <th>Date Depated</th>
                    <th>Time Depated</th>
                    <th>Vehicle</th>
              </tr>
            </thead>
            <tbody>
                 <tr>
                    
                    <td><?= $row['date_departure']; ?></td>
                    <td><?= $row['time_departure']; ?></td>
                    <td><?= $row['Vehicle']; ?></td>
            </tbody>
          </table>
          <table class="table">
            <thead>
              <tr>
                    <th>Date Arrival</th>
                    <th>Time Arrival</th>
                    <th>Update</th>
              </tr>
            </thead>
            <tbody>
                 <tr>
                    <td><?= $row['date_arrival']; ?></td>
                    <td><?= $row['time_arrival']; ?></td>
                    <td><?= $row['request']; ?></td>
            </tbody>
        </table>
      </div>
  </section>
</body>
</html>
