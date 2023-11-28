<?php 
session_start(); 
include "connectionDB/db_conn.php";

// back-end for monitor

// Administrative
if(isset($_POST["administrative"])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }



        $fname = validate($_POST['fname']);
        $plate_number = validate($_POST['plate_number']);
        $passenger = validate($_POST['passenger']);
        $place = validate($_POST['place']);
        $purpose = validate($_POST['purpose']);

        $time_departure = validate($_POST['time_departure']);
        $type1 = validate($_POST['type1']);

        $time_arrival = validate($_POST['time_arrival']);
        $type2 = validate($_POST['type2']);

        $time_depart = validate($_POST['time_depart']);
        $type3 = validate($_POST['type3']);

        $time_arrival_back = validate($_POST['time_arrival_back']);
        $type4 = validate($_POST['type4']);





        $distance = validate($_POST['distance']);
        $gasoline = validate($_POST['gasoline']);
        
        $balance = validate($_POST['balance']);
        $issued = validate($_POST['issued']);
        $additional_purchase = validate($_POST['additional_purchase']);
        $deduct = validate($_POST['deduct']);
        $gear_oil_issued = validate($_POST['gear_oil_issued']);
        $lub_oil_issued = validate($_POST['lub_oil_issued']);
        $grease_issued = validate($_POST['grease_issued']);
        $beggining = validate($_POST['beggining']);
        $end_of_trip = validate($_POST['end_of_trip']);
        $distance_travelled = validate($_POST['distance_travelled']);
        $date = validate($_POST['date']);

    


        $fname = mysqli_real_escape_string($con, $fname);
        $plate_number = mysqli_real_escape_string($con, $plate_number);
        $place = mysqli_real_escape_string($con, $place);
        $purpose = mysqli_real_escape_string($con, $purpose);
        



                    $user_data = 
                    '&fname='. $fname. 
                    '&plate_number='. $plate_number. 
                    '&passenger='. $passenger. 
                    '&place='. $place. 
                    '&purpose='. $purpose . 
                    '&time_departure='. $time_departure . 
                    '&time_arrival='. $time_arrival . 
                    '&time_depart='. $time_depart .
                    '&time_arrival_back='. $time_arrival_back .
                    '&distance='. $distance. 
                    '&gasoline='. $gasoline .
                    '&balance='. $balance. 
                    '&issued='.$issued. 
                    '&additional_purchase='.$additional_purchase.
                    '&deduct='.$deduct. 
                    '&gear_oil_issued='.$gear_oil_issued. 
                    '&lub_oil_issued='.$lub_oil_issued. 
                    '&grease_issued='.$grease_issued. 
                    '&beggining='.$beggining.
                    '&end_of_trip='.$end_of_trip. 
                    '&distance_travelled='.$distance_travelled. 
                    '&time_depart='.$time_depart. 
                    '&time_arrival_back='.$time_arrival_back ;
 
                if (empty($fname)) {
                    header("Location: /User_Auth/Admin/monitor.php?fname_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($plate_number)){
                    header("Location: /User_Auth/Admin/monitor.php?plate_number_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($passenger)){
                    header("Location: /User_Auth/Admin/monitor.php?passenger_Err=Required to fill-out&$user_data");
                    exit();
                }if(!preg_match("/^[a-zA-Z, ]*$/", $passenger)) {
                    header("Location: /User_Auth/Admin/monitor.php?passenger_Err=Invalid Format&$user_data");
                    exit();
                }else if(empty($place)){
                    header("Location: /User_Auth/Admin/monitor.php?place_Err=Required to fill-out&$user_data");
                    exit();
                }if(!preg_match("/^[a-zA-Z, ]*$/", $place)) {
                    header("Location: /User_Auth/Admin/monitor.php?place_Err=Invalid Format&$user_data");
                    exit();
                }else if(empty($purpose)){
                    header("Location: /User_Auth/Admin/monitor.php?purpose_Err=Required to fill-out&$user_data");
                    exit();
                }if(!preg_match("/^[a-zA-Z, ]*$/", $purpose)) {
                    header("Location: /User_Auth/Admin/monitor.php?purpose_Err=Invalid Format&$user_data");
                    exit();


                }if (empty($time_departure)) {
                    header("Location: /User_Auth/Admin/monitor.php?time_departure_Err=Required to fill-out$user_data");
                    exit();
                }if (empty($time_arrival)) {
                    header("Location: /User_Auth/Admin/monitor.php?time_arrival_Err=Required to fill-out$user_data");
                    exit();
                }if (empty($time_depart)) {
                    header("Location: /User_Auth/Admin/monitor.php?time_depart_Err=Required to fill-out$user_data");
                    exit();
                }else if(empty($time_arrival_back)){
                    header("Location: /User_Auth/Admin/monitor.php?time_arrival_back_Err=Required to fill-out&$user_data");
                    exit();






                }else if(empty($distance)){
                    header("Location: /User_Auth/Admin/monitor.php?distance_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($gasoline)){
                    header("Location: /User_Auth/Admin/monitor.php?gasoline_Err=Required to fill-out&$user_data");
                    exit();
                }if (empty($balance)) {
                    header("Location: /User_Auth/Admin/monitor.php?balance_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($issued)){
                    header("Location: /User_Auth/Admin/monitor.php?issued_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($additional_purchase)){
                    header("Location: /User_Auth/Admin/monitor.php?additional_purchase_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($deduct)){
                    header("Location: /User_Auth/Admin/monitor.php?deduct_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($gear_oil_issued)){
                    header("Location: /User_Auth/Admin/monitor.php?gear_oil_issued_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($lub_oil_issued)){
                    header("Location: /User_Auth/Admin/monitor.php?lub_oil_issued_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($grease_issued)){
                    header("Location: /User_Auth/Admin/monitor.php?grease_issued_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($beggining)){
                    header("Location: /User_Auth/Admin/monitor.php?beggining_Err=Required to fill-out&$user_data");
                    exit();
                }else if(empty($end_of_trip)){
                    header("Location: /User_Auth/Admin/monitor.php?end_of_trip_Err=Required to fill-out&$user_data");
                    exit();
                }
                else if(empty($distance_travelled)){
                    header("Location: /User_Auth/Admin/monitor.php?distance_travelled_Err=Required to fill-out&$user_data");
                    exit();
                }else{
                            
               $query_admin = "INSERT INTO administrative(date,fname,plate_number,passenger,place,purpose,time_departure,type1,time_arrival,type2,time_depart,type3,time_arrival_back,type4,distance,gasoline,balance,issued,additional_purchase,deduct,gear_oil_issued,lub_oil_issued,grease_issued,beggining,end_of_trip,distance_travelled) VALUES('$date', '$fname', '$plate_number', '$passenger', '$place', '$purpose','$time_departure', '$type1', '$time_arrival', '$type2', '$time_depart', '$type3', '$time_arrival_back', '$type4', '$distance','$gasoline','$balance' ,'$issued' ,'$additional_purchase' ,'$deduct' ,'$gear_oil_issued', '$lub_oil_issued' , '$grease_issued', '$beggining' , '$end_of_trip', '$distance_travelled')";
               $admin_result = mysqli_query($con, $query_admin);
               if ($admin_result) {
                    header("Location: /User_Auth/Admin/inprocess/results.php");
                    exit();
               }else {
                       header("Location: /User_Auth/Admin/monitor.php?error=Something wrong please try again&$user_data");
                    exit();
               }
        }
    }













 



    // 
if (isset($_POST['avail_to_rent']))
    {
    
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $id = validate($_POST['id']);
    $Hiace = validate($_POST['Hiace']);
	$Hilux = validate($_POST['Hilux']);
	$Isuzu = validate($_POST['Isuzu']);
	$Multi = validate($_POST['Multi']);
	$Jinbie = validate($_POST['Jinbie']);
	$Foton = validate($_POST['Foton']);
	$Tornado = validate($_POST['Tornado']);
	$Commuter = validate($_POST['Commuter']);
	$Innova = validate($_POST['Innova']);

    $id = mysqli_real_escape_string($con, $id);
    $Hiace = mysqli_real_escape_string($con, $Hiace);
    $Hilux = mysqli_real_escape_string($con, $Hilux);
    $Isuzu = mysqli_real_escape_string($con, $Isuzu);
    $Multi = mysqli_real_escape_string($con, $Multi);
    $Jinbie = mysqli_real_escape_string($con, $Jinbie);
    $Foton = mysqli_real_escape_string($con, $Foton);
    $Tornado = mysqli_real_escape_string($con, $Tornado);
    $Commuter = mysqli_real_escape_string($con, $Commuter);
    $Innova = mysqli_real_escape_string($con, $Innova);

    $sql = "UPDATE available SET Hiace='$Hiace',Hilux='$Hilux',Isuzu='$Isuzu', Multi='$Multi', Jinbie='$Jinbie', Foton='$Foton', Tornado='$Tornado', Commuter='$Commuter' , Innova='$Innova' WHERE id='$id' ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: /GSO_Reservation/User_Auth/Admin/availableVehicle.php?success=Inserted successfully");
        exit();
    }else {
        header("Location: /GSO_Reservation/User_Auth/Admin/updateAvail.php?error=Something Wrong Please try again!&$user_data");
        exit();
               }
        }
?>