<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $current_user = $_SESSION['unique_id'];
    $selected_user = mysqli_real_escape_string($conn, $_POST['selected_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message_text']);
    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (get_msg_id, post_msg_id, msg)
                                        VALUES ({$selected_user}, {$current_user}, '{$message}')") or die();
    }
} else {
    header("location: ../start.php");
}
?>