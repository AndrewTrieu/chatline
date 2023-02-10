<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (get_msg_id = {$row['unique_id']}
                OR post_msg_id = {$row['unique_id']}) AND (post_msg_id = {$current_user} 
                OR get_msg_id = {$current_user}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No message available";
    (strlen($result) > 20) ? $msg = substr($result, 0, 20) . '...' : $msg = $result;
    if (isset($row2['post_msg_id'])) {
        ($current_user == $row2['post_msg_id']) ? $you = "You: " : $you = "";
    } else {
        $you = "";
    }
    ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";
    ($current_user == $row['unique_id']) ? $hide_me = "hide" : $hide_me = "";
    ($row['img']) ? $img = $row['img'] : $img = "default.png";

    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="content">
                    <img src="php/assets/' . $img . '" alt="">
                    <div class="details">
                        <span>' . $row['first_name'] . " " . $row['last_name'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}
?>