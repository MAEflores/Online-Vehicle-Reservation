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
  <title>Delete Account</title>
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
<div class="main-content">
  <?php
  if(isset($_GET['id']))
  {
      $id = mysqli_real_escape_string($con, $_GET['id']);
      $query = "SELECT * FROM login WHERE id='$id' ";
      $query_run = mysqli_query($con, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          $row = mysqli_fetch_array($query_run);
  ?>
  <div>
    <form action="Actions.php" method="POST">
      <h2>Deleting an Account</h2><br>
      <input type="hidden" value="<?= $row['id']; ?>" name="id" >
      <label for="">User ID</label>
      <input type="text" name="user_id" value="<?= $row['user_id']; ?>">
      <label for="">Gmail Account</label>
      <input type="text" name="email" value="<?= $row['email']; ?>">
      <img src="/Verif_ID/<?=$row['image'];?>" style="border-radius:5px;width:300px;height:400px;">
      <select name="usertype">
          <option value="">User Type</option>
          <option value="user">New User</option>
      </select>
      <input type="submit" name="pass" value="SUBMIT">
    </form>
  </div>
<?php
}
}else{
echo "<h5> No Record Found </h5>";
}
?>
</section>
</body>
</html>