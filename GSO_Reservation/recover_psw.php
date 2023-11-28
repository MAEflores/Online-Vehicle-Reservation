
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
        <label>Enter Email Address</label>
        <input type="text" name="email" >
    </div>

        <div class="box">
            <input type="submit" name="recover" value="Change Password">
        </div>
        <br>
        <a href="login.php">Login</a>
        <br>
    </form>
</body>
</html>

<?php 
    if(isset($_POST["recover"])){
        include('server_connection/db_conn.php');
        $email = $_POST["email"];

        $sql = mysqli_query($con, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='gsovehiclereservation@gmail.com';
            $mail->Password='okxb ddwf ceyk zntr';
        
            // send by h-hotel email
            $mail->setFrom('gsovehiclereservation@gmail.com', 'GSO Reminder');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Please always remember your password</p>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("reset_psw.php");
                    </script>
                <?php
            }
        }
    }


?>
