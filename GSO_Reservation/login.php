<?php session_start(); 
ini_set('display_errors', 'Off');

include 'server_connection/db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="Design/login.css">
</head>
<body>
<form action="authentication.php" method="POST">
<img src="images/res.jpeg" class="avatar">
    <div class="box">
        <label>User ID</label>
        <?php if (isset($_GET['user_id'])) { ?><input type="text" name="user_id" value="<?php echo $_GET['user_id']; ?>">
        <?php }else{ ?><input type="text" name="user_id" ><?php }?>
        <?php if (isset($_GET['user_Err'])) { ?>
                    <div class="error"><?php echo $_GET['user_Err']; ?></div>
        <?php } ?>
    </div>


    <div class="box">
        <label>Password</label>
        <?php if (isset($_GET['password'])) { ?><input type="password" name="password" value="<?php echo $_GET['password']; ?>">
        <?php }else{ ?><input type="password" name="password" ><?php }?>
        <?php if (isset($_GET['password_Err'])) { ?>
                    <div class="error"><?php echo $_GET['password_Err']; ?></div>
        <?php } ?>
    </div>

    <div class="box">
        <input type="submit" name="submit" value="Login">
    </div><br>

        <a href="index.php">Create account?</a><br>
        <a href="recover_psw.php">Forgot password?</a>

</form>
</body>
</html>