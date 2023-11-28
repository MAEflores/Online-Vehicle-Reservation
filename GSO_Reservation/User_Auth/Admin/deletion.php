<?php
require 'server_connection/db_conn.php';

if (isset($_POST['send'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     $id = validate($_POST['id']);
     $email = validate($_POST['email']);


    $query = "UPDATE login SET email='$email' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
        if($query_run){
            require "phpmailer/PHPMailerAutoload.php";
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
            $mail->Subject="GSO Reminder!";
            $mail->Body="<p>Dear user, </p> <h3>Your User ID is $user_id <br></h3>";
        
                    if(!$mail->send()){
                        ?>
                            <script>
                                alert("<?php echo "Register Failed, Please Check Your Internet Connection or Invalid Email "?>");
                            </script>
                        <?php
                    }else{
        header("Location: /User_Auth/Admin/addAccount.php?id=$id");
        exit(0);
        }
    }
}

?>