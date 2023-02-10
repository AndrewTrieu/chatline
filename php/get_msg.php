<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $current_user = $_SESSION['unique_id'];
    $selected_user = mysqli_real_escape_string($conn, $_POST['selected_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.post_msg_id
                WHERE (post_msg_id = {$current_user} AND get_msg_id = {$selected_user})
                OR (post_msg_id = {$selected_user} AND get_msg_id = {$current_user}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            ($row['img']) ? $img = $row['img'] : $img = "default.png";
            if ($row['post_msg_id'] === $current_user) {
                $output .= '<div class="chat post">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat get">
                                <img src="php/assets/' . $img . '" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">Send a message to start conversation :)</div>';
    }
    echo $output;
} else {
    header("location: ../start.php");
}
?>