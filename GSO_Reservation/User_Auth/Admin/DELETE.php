<?php
require 'server_connection/db_conn.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM login WHERE id='$id'";
        if ($con->query($sql) === TRUE) {
            header("Location: home.php");
        } else {
            header("Location: home.php");
        }
    }

?>