<?php
if($query_run){
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['mail'] = $email;
    require "phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='gsovehiclereservation@gmail.com';
    $mail->Password='okxb ddwf ceyk zntr';
    

    $mail->setFrom('gsovehiclereservation@gmail.com', 'Notification from GSO');
    $mail->addAddress('njverzosa24@gmail.com');

    $mail->isHTML(true);
    $mail->Subject="You have new request for reservation";
    $mail->Body="<p>$name, </p> <h3>is requesting reservation, kindly check your dashboard<br></h3>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo "Request Failed, Please Check Your Internet Connection"?>");
                    </script>
                <?php
            }else{
                header("Location:  /User_Auth/Users/Form.php?error=Something Wrong, Please try Again&$user_data");
                exit(0);
        }
    }
?>