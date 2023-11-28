<?php 
session_start();
include 'server_connection/db_conn.php';
unset($_SESSION["id"]);
unset($_SESSION["admin_id"]);
session_unset();
session_destroy();
header("Location:/GSO_Reservation/login.php");
?>