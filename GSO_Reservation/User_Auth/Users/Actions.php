<?php 
session_start(); 
include 'server_connection/db_conn.php';

if (isset($_POST['send_request'])) {
    
    $id = $_POST['id'];
    $name = $_POST['name'];

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }


    $date_arrival = validate($_POST['date_arrival']);
    $time_arrival = validate($_POST['time_arrival']);
    $date_departure = validate($_POST['date_departure']);
    $time_departure = validate($_POST['time_departure']);
    $passangers = validate($_POST['passangers']);
    $visited = validate($_POST['visited']);
    $letter = validate($_POST['letter']);
    $Vehicle = validate($_POST['Vehicle']);
    $Driver = validate($_POST['Driver']);
    $request = validate($_POST['request']);

 


    $date_arrival = mysqli_real_escape_string($con, $date_arrival);
    $time_arrival = mysqli_real_escape_string($con, $time_arrival);
    $date_departure = mysqli_real_escape_string($con, $visited);
    $time_departure = mysqli_real_escape_string($con, $time_departure);
    $passangers = mysqli_real_escape_string($con, $passangers);
    $visited = mysqli_real_escape_string($con, $visited);
    $letter = mysqli_real_escape_string($con, $letter);
    $Vehicle = mysqli_real_escape_string($con, $Vehicle);
    $Driver = mysqli_real_escape_string($con, $Driver);
    $request = mysqli_real_escape_string($con, $request);


    $user_data = '&date_arrival='. $date_arrival. '&time_arrival='. $time_arrival.'&date_departure='. $date_departure.'&time_departure='. $time_departure.'&passangers='. $passangers. '&visited='. $visited. '&letter='. $letter. '&Vehicle='. $Vehicle. '&Driver='. $Driver ;

    if (empty($date_arrival)) {
        header("Location: /User_Auth/Users/Form.php?date_arrival_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($time_arrival)){
        header("Location: /User_Auth/Users/Form.php?time_arrival_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($date_departure)){
        header("Location: /User_Auth/Users/Form.php?date_departure_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($time_departure)){
        header("Location: /User_Auth/Users/Form.php?time_departure_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($passangers)){
        header("Location: /User_Auth/Users/Form.php?passangers_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($visited)){
        header("Location: /User_Auth/Users/Form.php?visited_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($letter)){
        header("Location: /User_Auth/Users/Form.php?letter_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($Vehicle)){
        header("Location: /User_Auth/Users/Form.php?Vehicle_Err=Choose Vehicle&$user_data");
        exit();
    }else if(empty($Driver)){
        header("Location: /User_Auth/Users/Form.php?Driver_Err=Choose Driver&$user_data");
        exit();
    }else{


    $query = "UPDATE login SET name='$name',date_arrival='$date_arrival', time_arrival='$time_arrival', date_departure='$date_departure', time_departure='$time_departure', passangers='$passangers', visited='$visited', letter='$letter', Vehicle='$Vehicle', Driver='$Driver', request='$request' WHERE id='$id' ";
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
                
            
                $mail->setFrom('gsovehiclereservation@gmail.com', 'Notification from GSO');
                $mail->addAddress('gsovehiclereservation@gmail.com');
            
                $mail->isHTML(true);
                $mail->Subject="Request For Reservation";
                $mail->Body="<p>$name, </p> <h3>is requesting for a reservation, kindly check your dashboard<br></h3>";
            
                        if(!$mail->send()){
                            ?>
                                <script>
                                    alert("<?php echo "Request Failed, Please Check Your Internet Connection"?>");
                                </script>
                            <?php
                        }else{
                            header("Location:  /User_Auth/Users/Form-edit.php");
                            exit(0);
                }
            }
        }
}

if (isset($_POST['form_edit'])) {

 
    
    $id = $_POST['id'];
    $name = $_POST['name'];


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }


    $date_arrival = validate($_POST['date_arrival']);
    $time_arrival = validate($_POST['time_arrival']);
    $date_departure = validate($_POST['date_departure']);
    $time_departure = validate($_POST['time_departure']);
    $passangers = validate($_POST['passangers']);
    $visited = validate($_POST['visited']);
    $letter = validate($_POST['letter']);
    $Vehicle = validate($_POST['Vehicle']);
    $Driver = validate($_POST['Driver']);
    $request = validate($_POST['request']);


    $date_arrival = mysqli_real_escape_string($con, $date_arrival);
    $time_arrival = mysqli_real_escape_string($con, $time_arrival);
    $date_departure = mysqli_real_escape_string($con, $visited);
    $time_departure = mysqli_real_escape_string($con, $time_departure);
    $passangers = mysqli_real_escape_string($con, $passangers);
    $visited = mysqli_real_escape_string($con, $visited);
    $letter = mysqli_real_escape_string($con, $letter);
    $Vehicle = mysqli_real_escape_string($con, $Vehicle);
    $Driver = mysqli_real_escape_string($con, $Driver);
    $request = mysqli_real_escape_string($con, $request);


    $user_data = '&date_arrival='. $date_arrival. '&time_arrival='. $time_arrival.'&date_departure='. $date_departure.'&time_departure='. $time_departure.'&passangers='. $passangers. '&visited='. $visited. '&letter='. $letter. '&Vehicle='. $Vehicle. '&Driver='. $Driver ;

    if (empty($date_arrival)) {
        header("Location: /User_Auth/Users/Form.php?date_arrival_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($time_arrival)){
        header("Location: /User_Auth/Users/Form.php?time_arrival_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($date_departure)){
        header("Location: /User_Auth/Users/Form.php?date_departure_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($time_departure)){
        header("Location: /User_Auth/Users/Form.php?time_departure_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($passangers)){
        header("Location: /User_Auth/Users/Form.php?passangers_Err=Required to fill-out&$user_data");
        exit();
    }
    else if(empty($visited)){
        header("Location: /User_Auth/Users/Form.php?visited_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($letter)){
        header("Location: /User_Auth/Users/Form.php?letter_Err=Required to fill-out&$user_data");
        exit();
    }else if(empty($Vehicle)){
        header("Location: /User_Auth/Users/Form.php?Vehicle_Err=Choose Vehicle&$user_data");
        exit();
    }else if(empty($Driver)){
        header("Location: /User_Auth/Users/Form.php?Driver_Err=Choose Driver&$user_data");
        exit();
    }else{


    $query = "UPDATE login SET name='$name', date_arrival='$date_arrival', time_arrival='$time_arrival', date_departure='$date_departure', time_departure='$time_departure', passangers='$passangers', visited='$visited', letter='$letter', Vehicle='$Vehicle', Driver='$Driver', request='$request' WHERE id='$id' ";
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
                
            
                $mail->setFrom('gsovehiclereservation@gmail.com', 'Notification from GSO');
                $mail->addAddress('gsovehiclereservation@gmail.com');
            
                $mail->isHTML(true);
                $mail->Subject="Request For Reservation";
                $mail->Body="<p>$name, </p> <h3>is update a request for a reservation, kindly check your dashboard<br></h3>";
            
                        if(!$mail->send()){
                            ?>
                                <script>
                                    alert("<?php echo "Request Failed, Please Check Your Internet Connection"?>");
                                </script>
                            <?php
                        }else{
                            header("Location:  /User_Auth/Users/Request.php");
                            exit(0);
                }
            }
        }


if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }



    $user_id = validate($_POST['user_id']);
    $phone_number = validate($_POST['phone_number']);
    $email = validate($_POST['email']);


    $query = "UPDATE login SET user_id='$user_id', phone_number='$phone_number', email='$email' WHERE id='$id' ";
    if(mysqli_query($con, $query)){
        header('Location: /User_Auth/Users/Profile.php');
    }else
    {
        header("Location:  /User_Auth/Users/setting.php");
        exit(0);
        }
    }
}
?> 