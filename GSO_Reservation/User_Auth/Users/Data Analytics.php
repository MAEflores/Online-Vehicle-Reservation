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
  <title>Data Analytics</title>
  <link rel="stylesheet" href="sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
            <h1>Vehicles Ratings</h1>
      </div>
      <div class="main-content">
          <?php
          include 'server_connection/db_conn.php';

          $test = array();

          $count=0;
          $res=mysqli_query($con,"select * from used_vehicles");
          while($row = mysqli_fetch_array($res))
          {
              $test[$count]["label"]=$row["vehicle"];
              $test[$count]["y"]=$row["month"];

              $count=$count+1;

          }
          ?>
          <script>
              
          window.onload = function() {
          
          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1",
            title:{
              text: "Vehicles"
            },
            axisY: {
              title: "Most used vehicles per Month"
            },
            data: [{
              type: "column",
              yValueFormatString: "#,##0.## Vehicles",
              dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
            }]
          });
          chart.render();
          
          }
          </script>
          <body>

          <div id="chartContainer" style="height: 500px; width: 75%; margin-left: 2%; margin-top: 50px;"></div>
          <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
          </body>
      <div>
  </section>
</body>
</html>