<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $sql = mysqli_query($conn, "UPDATE users SET status = 'Offline' WHERE unique_id={$_GET['logout_id']}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../start.php");
        }
    } else {
        header("location: ../home.php");
    }
} else {
    header("location: ../start.php");
}