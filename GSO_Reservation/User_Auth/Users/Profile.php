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
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Profile Page</title>
   <link rel="stylesheet" href="profileCss/style.css">

</head>
<body>

<h1 class="title"> <span>Welcome</span> <?= $row['name']; ?> </h1>

<section class="profile-container">
   <div class="profile">
      <img src="Profile/<?= $row['image2']; ?>">
      <h3><?= $row['name']; ?></h3>
      <h3><?= $row['email']; ?></h3>
      <h3><?= $row['phone_number']; ?></h3>
      <a href="setting.php" class="btn">update profile</a>
      <div class="flex-btn">
         <a href="/log-out.php" class="delete-btn">logout</a>
         <a href="Request.php" class="option-btn"> My Request </a>
      </div>
   </div>

</section>

</body>
</html>