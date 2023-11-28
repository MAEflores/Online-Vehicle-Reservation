<?php session_start() ;
    include('server_connection/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="Design/reset.css">
</head>
<body>
<form action="#" method="POST" name="login">
<img src="images/res.jpeg" class="avatar">
    <div class="box">
        <label>Password</label>
        <?php if (isset($_GET['password'])) { ?><input type="password" name="password" value="<?php echo $_GET['password']; ?>">
        <?php }else{ ?><input type="password" name="password" ><?php }?>
        <?php if (isset($_GET['password_Err'])) { ?>
                    <div class="error"><?php echo $_GET['password_Err']; ?></div>
        <?php } ?>
    </div>

        <div class="box">
            <input type="submit" name="reset" value="Submit New Password">
        </div><br>
    </form>
</body>
</html>
<?php
    if(isset($_POST["reset"])){
        include('server_connection/db_conn.php');
        $password = $_POST["password"];

        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        if (empty($password)) {
            header("Location: /GSO_Reservation/reset_psw.php?password_Err=New password required&$user_data");
            exit();
        }else if(!preg_match("/^[0-9]{6}+$/", $password)) {
            header("Location: /GSO_Reservation/reset_psw.php?password_Err=Password must be six digits&$user_data");        
            exit();
        }else{
        $sql = mysqli_query($con, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($email){
            $password = md5($password);
            mysqli_query($con, "UPDATE login SET password='$password' WHERE email='$email'");
            ?>
            <script>
                window.location.replace("login.php");
                alert("<?php echo "Your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }
}
?>
