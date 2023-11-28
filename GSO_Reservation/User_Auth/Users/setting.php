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

   <title>user profile update</title>

   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" href="profileCss/style.css">

</head>
<body>
<h1 class="title"> update <span>user</span> profile </h1>

<section class="update-profile-container">

   <form action="" method="post" enctype="multipart/form-data">
         <img src="Profile/<?= $row['image2']; ?>">

         <div class="flex">
            <div class="inputBox">
                <span>Profile pic : </span>
                <input type="hidden" name="image2" value="<?= $row['image2']; ?>">
                <input type="file" name="image2" class="box" accept="image/jpg, image/jpeg, image/png">
            </div>
          </div>



      <div class="flex-btn">
         <input type="submit" value="update profile" name="update_profile" class="btn">
         <a href="Profile.php" class="option-btn">go back</a>
      </div>
   </form>

</section>
<script>
  function profile(){
    location.replace('setting2.php');
  }
</script>
</body>
</html>
<?php
            if(isset($_POST['update_profile']))
            {
            //   function validate($data){
            //     $data = trim($data);
            //     $data = stripslashes($data);
            //     $data = htmlspecialchars($data);
            //     return $data;
            // }
            //     $phone_number = validate($_POST['phone_number']);
            //     $email = validate($_POST['email']);
            //     $phone_number = mysqli_real_escape_string($con, $phone_number);
            //     $email = mysqli_real_escape_string($con, $email);
    
                $fileName = $_FILES["image2"]["name"];
                $fileSize = $_FILES["image2"]["size"];
                $tmpName = $_FILES["image2"]["tmp_name"];
                $validImageExtension = ['jpg', 'jpeg', 'png'];
            
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                if ( !in_array($imageExtension, $validImageExtension) ){
                  echo "<script>alert('Your Profile Invalid is Format!');
                  location.replace('/GSO_Reservation/User_Auth/Users/setting.php');
                  </script>";
                }
                else{
                  
                
                    $newImageName = uniqid();
                    $newImageName .= '.' . $imageExtension;
              
                    move_uploaded_file($tmpName, 'Profile/'. $newImageName);
    
            
            
                $query = "UPDATE login SET image2='$newImageName' WHERE id='$id' ";
                if(mysqli_query($con, $query)){
                  echo "<script>alert('Updated!');
                  location.replace('/User_Auth/Users/Profile.php');
                  </script>";
                }else
                {
                  echo "<script>alert('Failed to update');
                  location.replace('/User_Auth/Users/setting.php');
                  </script>";
                    }
                }
              }
            ?>