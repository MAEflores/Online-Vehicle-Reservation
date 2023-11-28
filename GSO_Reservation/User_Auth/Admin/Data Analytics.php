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
  <title>Data Analytics</title>
  <link rel="stylesheet" href="css/sidebar.css"/>
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
            <h1>Vehicles Ratings</h1>
      </div>
      <div class="main-content">
            <style>
              input[type=text], select {
              width: 15%;
              padding: 5px 5px;
              /* margin: 8px 0; */
              display: inline-block;
              border: 2px solid black;
              border-radius: 4px;
              box-sizing: border-box;
              margin-left: 5%;
            }

            input[type=submit] {
              width: 5%;
              background-color: #4CAF50;
              color: white;
              padding: 5px 10px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }

            input[type=submit]:hover {
              background-color: #45a049;
            }
            label{
              font-weight: bold;
            }
            .select {
              background: #e0d8d8;
              color: red;
              padding: 10px;
              width: 100%;
              border-radius: 2px;
              margin: 10px auto;
            }
            </style>
              <form action="Actions.php" method="POST">
                <b>Insert Total Vehicles In A Month</b><br>
                    <div class="select">
                        <input type="text" class="select" name="month" placeholder="Many times use"required>
                        <select name="vehicle" required>
                          <option value="">Choose a Driver Here </option>
                          <option value="Toyota Hiace">Toyota Hiace</option>
                          <option value="Toyota Hilux">Toyota Hilux</option>
                          <option value="Isuzu DI N944">Isuzu DI N944</option>
                          <option value="Multi Cab">Multi Cab</option>
                          <option value="Innova">Inova</option>
                          <option value="Jinbie Truck">Jinbie Truck</option>
                          <option value="Foton Truck">Foton Truck</option>
                          <option value="Foton Truck Tornado">Foton Truck Tornado</option>
                          <option value="Commuter">Commuter</option>
                        </select>
                        <input type="submit" name="add" value="ADD">
                    </div>   
              </form>
          <?php

          // $server_name = "localhost";
          // $user_name = "root";
          // $password = "";
          // $db_name = "Vehicle_Reservation";

          $server_name = "localhost";
          $user_name = "u455891420_vrs_01";
          $password = "Vehicle_reservation2345";
          $db_name = "u455891420_vrs_01";



          $con = new mysqli($server_name , $user_name, $password, $db_name);


          // $link = mysqli_connect("localhost","root","");
          // mysqli_select_db($link,"vehicle_reservation");

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
