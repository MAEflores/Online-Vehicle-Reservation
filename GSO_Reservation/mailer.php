<?php
if($result){
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['mail'] = $email;
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
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);
    $mail->Subject="Your Verification Code";
    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo "Register Failed, Please Check Your Internet Connection or Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                <script>
                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                    window.location.replace('verification.php');
                </script>
                <?php
            }
}
?>