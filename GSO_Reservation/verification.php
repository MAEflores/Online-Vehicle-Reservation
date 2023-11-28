<?php session_start(); 
ini_set('display_errors', 'Off');

include 'server_connection/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Code</title>
    <link rel="stylesheet" href="Design/verif.css">
</head>
<body>
<form action="#" method="POST">
<img src="images/res.jpeg" class="avatar">
    <div class="box">
        <label>OTP Code</label>
        <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
        <?php if (isset($_GET['otp_Err'])) { ?>
                    <div class="error"><?php echo $_GET['otp_Err']; ?></div>
        <?php } ?>
        <p>NOTE: Please check your email inbox for OTP Code.</p>
    </div>

    <div class="box">
        <input type="submit" name="verify" value="Verify">
    </div><br>
</form>
</body>
</html>
<?php 
    include('server_connection/db_conn.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            header("Location: verification.php?otp_Err=Invalid OTP code");
        }else{
            mysqli_query($con, "UPDATE login SET status = 1 WHERE email = '$email'");
                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='gsovehiclereservation@gmail.com';
                $mail->Password='okxb ddwf ceyk zntr';
                

                $mail->setFrom('gsovehiclereservation@gmail.com', 'GSO Vehicle Reservation');
                $mail->addAddress('gsovehiclereservation@gmail.com');

                $mail->isHTML(true);
                $mail->Subject="User Registration";
                $mail->Body="<p>Hi Admin, </p> <h3>Your system has new User => $email, Kindly Check your HOMEPAGE<br></h3>";

                        if(!$mail->send()){
                        }else{
                            ?>
                                <script>
                                    window.location.replace('login.php');
                                </script>
                        
                            <?php
                        }
                    }
                }



?>