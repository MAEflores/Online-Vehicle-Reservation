<?php

// $server_name = "localhost";
// $user_name = "root";
// $password = "";
// $db_name = "Vehicle_Reservation";

$server_name = "localhost";
$user_name = "u455891420_vrs_01";
$password = "Vehicle_reservation2345";
$db_name = "u455891420_vrs_01";

$con = new mysqli($server_name , $user_name, $password, $db_name);
if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>