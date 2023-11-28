<?php session_start(); ?>
<?php
ini_set('display_errors', 'Off');

include 'server_connection/db_conn.php';

        if(isset($_POST["register"])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
            $name = validate($_POST['name']);
            $age = validate($_POST['age']);
            $gender = validate($_POST['gender']);
            $address = validate($_POST['address']);
            $phone_number = validate($_POST['phone_number']);
            $email = validate($_POST['email']);
            $password = validate($_POST['password']);
            $sel_id = validate($_POST['sel_id']);

            $name = mysqli_real_escape_string($con, $name);
            $age = mysqli_real_escape_string($con, $age);
            $gender = mysqli_real_escape_string($con, $gender);
            $address = mysqli_real_escape_string($con, $address);
            $phone_number = mysqli_real_escape_string($con, $phone_number);
            $email = mysqli_real_escape_string($con, $email);
            $password = mysqli_real_escape_string($con, $password);
            $sel_id = mysqli_real_escape_string($con, $sel_id);
        
        
              $user_data = '&name='. $name. '&age='. $age. '&gender='. $gender. '&address='. $address. '&phone_number='. $phone_number. '&email='. $email. '&password='. $password . '&sel_id='. $sel_id;

            //   $user_data = '&name='. $name; 
            //   $user_data = '&age='. $age;
            //   $user_data = '&gender='. $gender;
            //   $user_data = '&gender='. $gender;
            //   $user_data = '&address='. $address;
            //   $user_data = '&phone_number='. $phone_number;
            //   $user_data = '&email='. $email;
            //   $user_data = '&password='. $password;
            //   $user_data = '&sel_id='. $sel_id;

            if (empty($name)) {
              header("Location: index.php?name_Err=Name is required&$user_data");
              exit();
            }if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
              header("Location: index.php?name_Err=Invalid Format&$user_data");
              exit();
            }else if(empty($age)){
              header("Location: index.php?age_Err=Age is required&$user_data");
              exit();
            }if(!preg_match("/^[1-9]{2}+$/", $age)) {
              header("Location: index.php?age_Err=Age is Invalid Format&$user_data");
              exit();
            }else if(empty($gender)){
              header("Location: index.php?gender_Err=Gender is required&$user_data");
              exit();
            }else if(empty($address)){
              header("Location: index.php?address_Err=Address is required&$user_data");
              exit();
            }else if(empty($phone_number)){
              header("Location: index.php?phone_number_Err=Number is required&$user_data");
              exit();
            }if(!preg_match("/^[0-9]{11}+$/", $phone_number)) {
              header("Location: index.php?phone_number_Err=Number is Invalid Format&$user_data");
              exit();
            }else if(empty($email)){
              header("Location: index.php?gmail_Err=Email Address is required&$user_data");
              exit();
            }if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: index.php?gmail_Err=Email Address Invalid Format&$user_data");
              exit();
            }else if(empty($password)){
              header("Location: index.php?password_Err=Password is required&$user_data");
              exit();
            }if(!preg_match("/^[0-8]{8}+$/", $password)) {
                header("Location: index.php?password_Err=Password must be 8 Digits&$user_data");
                exit();
            }else if(empty($sel_id)){
              header("Location: index.php?id_Err=Choose ID&$user_data");
              exit();
            }else{
                

                $fileName = $_FILES["image"]["name"];
                $fileSize = $_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];
                $validImageExtension = ['jpg', 'jpeg', 'png'];
            
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                if ( !in_array($imageExtension, $validImageExtension) ){
                  header("Location: index.php?image_Err=Valid are .jpeg .png .jpg&$user_data");
                }
                else{
            
        
                $check_query = mysqli_query($con, "SELECT * FROM login where email ='$email'");
                $rowCount = mysqli_num_rows($check_query);

                if(!empty($email) && !empty($password)){
                    if($rowCount > 0){
                        ?>
                        <script>
                            alert("Email already exist!");
                        </script>
                        <?php
                    }else{
              
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
          
                move_uploaded_file($tmpName, 'Verif_ID/'. $newImageName);
          
            
                $password = md5($password);

                $result = mysqli_query($con, "INSERT INTO login (email, password, status,name,age,address,phone_number,image,sel_id) VALUES ('$email', '$password', 0,'$name','$age','$address','$phone_number', '$newImageName' ,'$sel_id')");

                // You can insert here the file directory of mailer
                // Code ..
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
                                        alert("<?php echo "Register Failed, Please Check Your Internet Connection"?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent!"?>");
                                    window.location.replace('verification.php');
                                </script>
                                <?php
                            }
                }}
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="Design/register.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <img src="images/res.jpeg" class="avatar">
            <div class="row">
                <div class="box">
                    <label>Full Name</label>
                    <?php if (isset($_GET['name'])) { ?><input type="text" name="name" value="<?php echo $_GET['name']; ?>">
                    <?php }else{ ?><input type="text" name="name" ><?php }?>
                    <?php if (isset($_GET['name_Err'])) { ?>
                                <div class="error"><?php echo $_GET['name_Err']; ?></div>
                    <?php } ?>
                </div>
                <div class="box">
                    <label>Age</label>
                    <?php if (isset($_GET['age'])) { ?><input type="text" name="age" value="<?php echo $_GET['age']; ?>">
                    <?php }else{ ?><input type="text" name="age" ><?php }?>
                    <?php if (isset($_GET['age_Err'])) { ?>
                                <div class="error"><?php echo $_GET['age_Err']; ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="box">
                    <label>Gender</label>
                    <select name="gender" class="form-inline">
                    <?php if (isset($_GET['gender'])) { ?><option value="<?php echo $_GET['gender']; ?>"><?php echo $_GET['gender']; ?></option>
                        <?php }else{ ?><option value="">Choose Gender</option><?php }?>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <?php if (isset($_GET['gender_Err'])) { ?>
                                <div class="error"><?php echo $_GET['gender_Err']; ?></div>
                    <?php } ?>
                </div>
                <div class="box">
                    <label>Phone Number</label>
                    <?php if (isset($_GET['phone_number'])) { ?><input type="tel" name="phone_number" value="<?php echo $_GET['phone_number']; ?>">
                    <?php }else{ ?><input type="tel" name="phone_number" ><?php }?>
                    <?php if (isset($_GET['phone_number_Err'])) { ?>
                                <div class="error"><?php echo $_GET['phone_number_Err']; ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="box">
                    <label>Email Address</label>
                    <?php if (isset($_GET['email'])) { ?><input type="email" name="email" value="<?php echo $_GET['email']; ?>">
                    <?php }else{ ?><input type="email" name="email" ><?php }?>
                    <?php if (isset($_GET['gmail_Err'])) { ?>
                                <div class="error"><?php echo $_GET['gmail_Err']; ?></div>
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
            </div><br>
            <div class="row">
                <div class="box">
                <label>Choose ID</label>
                    <select name="sel_id" class="form-inline">
                    <?php if (isset($_GET['sel_id'])) { ?><option value="<?php echo $_GET['sel_id']; ?>"><?php echo $_GET['sel_id']; ?></option>
                        <?php }else{ ?><option value="">Choose ID</option><?php }?>
                        <option value="National ID">National ID</option>
                        <option value="Student Permit">Student Permit</option>
                        <option value="Company ID">Company ID</option>
                        <option value="Voter ID">Voter's ID</option>
                        <option value="Voter Certificate">Voter's Cert</option>
                    </select>
                    <?php if (isset($_GET['id_Err'])) { ?>
                                <div class="error"><?php echo $_GET['id_Err']; ?></div>
                    <?php } ?>
                </div>
                <div class="box">
                <label>Choose Address</label>
                    <select name="address" class="form-inline">
                    <?php if (isset($_GET['address'])) { ?><option value="<?php echo $_GET['address']; ?>"><?php echo $_GET['address']; ?></option>
                        <?php }else{ ?><option value="">Choose Address</option><?php }?>
                        <option value="Anapao">Anapao</option>
                        <option value="Cacayasen">Cacayasen</option>
                        <option value="Concordia">Concordia</option>
                        <option value="Ilio-Ilio">Ilio-Ilio</option>
                        <option value="Poblacion">Poblacion</option>
                        <option value="Pogoruac">Pogoruac</option>
                        <option value="Don Matias">Don Matias</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="San Pascual">San Pascual</option>
                        <option value="San Vicente">San Vicente</option>
                        <option value="Sapa Grande">Sapa Grande</option>
                        <option value="Sapa Pequena">Sapa Pequena</option>
                        <option value="Tambacan">Tambacan</option>
                    </select>
                    <?php if (isset($_GET['address_Err'])) { ?>
                                <div class="error"><?php echo $_GET['address_Err']; ?></div>
                    <?php } ?>
                </div>
            </div><br>
                    <label>Upload an ID for Verification</label>
                    <?php if (isset($_GET['image'])) { ?><input type="file" name="image" value="<?php echo $_GET['image']; ?>">
                    <?php }else{ ?><input type="file" name="image" accept="jpeg, png, jpg"><?php }?>
                    <?php if (isset($_GET['image_Err'])) { ?>
                                <div class="error"><?php echo $_GET['image_Err']; ?></div>
                    <?php } ?>
                        <div class="box"><br>
                            <input type="submit" name="register" value="Register Now">
                        </div>
            <br><a href="login.php" class="link">Already have an account?</a>
    </form>


</body>
</html>