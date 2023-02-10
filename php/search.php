<?php
session_start();
include_once "config.php";
$current_user = $_SESSION["unique_id"];
if (isset($_POST["query"])) {
    $query = mysqli_real_escape_string($conn, $_POST["query"]);
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$current_user} AND (first_name LIKE '%{$query}%' OR last_name LIKE '%{$query}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        include_once "list.php";
    } else {
        $output .= "User not found :(";
    }
    echo $output;
}
?>