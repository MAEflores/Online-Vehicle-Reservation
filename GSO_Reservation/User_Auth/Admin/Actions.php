<?php
require 'server_connection/db_conn.php';

if (isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $request = $_POST['request'];


    $query = "UPDATE login SET request='$request' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: /User_Auth/Admin/approval.php");
        exit(0);
    }
    else
    {
        header("Location: /User_Auth/Admin/approval.php");
        exit(0);
        
    }
}



// Magsesend sa user ng User ID
if (isset($_POST['pass'])) {
    
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     $id = validate($_POST['id']);
     $user_id = validate($_POST['user_id']);
     $email = validate($_POST['email']);
     $user_id = validate($_POST['user_id']);


    $query = "UPDATE login SET user_id='$user_id', usertype='$usertype', email='$email' WHERE id='$id' ";
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
                                    alert("<?php echo "Please Check Your Internet Connection"?>");
                                    window.location.replace('/User_Auth/Admin/home.php');
                                </script>
                        <?php
                    }else{
        header("Location: /User_Auth/Admin/addAccount.php?id=$id");
        exit(0);
        }
    }
}


// Magsesend ng notification sa user bago idelete ni Admin ang account kung hindi valid ang ID na inupload
if (isset($_POST['delete'])) {
    
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
            $mail->Subject="Account Deletion Notification";
            $mail->Body="<p>Dear User, 
            We hope this message finds you well. This is to inform you that your account with 
            <b>GSO Vehicle Reservation</b> has been deleted due to Validating a Verified ID
            .Please register again and choose an ID and upload a match selected verified ID.
            We appreciate your understanding.<p>

            Thank you for being a part of <b>GSO Vehicle Reservation</b>.<br>

            Best regards,<br>

            <b>GSO Vehicle Reservation</b>
            <b>ginezjamaica@gmail.com</b>
            ";
        
                    if(!$mail->send()){
                        ?>
                            <script>
                                alert("<?php echo "Register Failed, Please Check Your Internet Connection or Invalid Email "?>");
                            </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            <?php
                            $sql = "DELETE FROM login WHERE id='$id'";
                            if ($con->query($sql) === TRUE) {
                                header("Location: home.php");
                            } else {
                                header("Location: home.php");
                            }
        }
    }
}


if(isset($_POST['add']))
{	 
    $vehicle = $_POST['vehicle'];
    $month = $_POST['month'];

      $sql = "INSERT INTO used_vehicles (vehicle,month) values ('$vehicle','$month')";
      if (mysqli_query($con, $sql)) {
        header('Location: /User_Auth/Admin/Data Analytics.php');
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
    }




?>