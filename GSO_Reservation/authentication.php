<?php 
session_start(); 
include 'server_connection/db_conn.php';

if (isset($_POST['user_id']) && isset($_POST['password'])) {

  function validate($data){
      $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $user_id = validate($_POST['user_id']);
  $password = validate($_POST['password']);

  $user_id = mysqli_real_escape_string($con, $user_id);
  $password = mysqli_real_escape_string($con, $password);

  $user_data = '&user_id='. $user_id;
  


  if (empty($user_id)) {
    header("Location: /GSO_Reservation/login.php?user_Err=ID is required&$user_data");
  exit();
  }else if(empty($password)){
    header("Location: /GSO_Reservation/login.php?password_Err=Password is required&$user_data");
  exit();
  }else{

      $password = md5($password);
      $result = mysqli_query($con, "SELECT * FROM login WHERE user_id = '$user_id'");
      $row = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
          if ($row['usertype'] === "admin")
          {
            $_SESSION["admin_id"] = $row["id"];  
            header("Location: ./User_Auth/Admin/home.php");
          }
          elseif ($row['usertype'] === "user")
          {
            $_SESSION["id"] = $row["id"];  
            header("Location: ./User_Auth/Users/Profile.php");
          }
        }
        else{
          header("Location: /GSO_Reservation/login.php?password_Err=Wrong_Password&$user_data");
        }
      }
      else{
        header("Location: /GSO_Reservation/login.php?user_Err=ID is not registered&$user_data");
          }
        }
      }
?>