<?php
session_start();
include_once "config.php";
function escape($conn, $value)
{
    return mysqli_real_escape_string($conn, $value);
}
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function fetchUserByEmail($conn, $email)
{
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    return mysqli_fetch_assoc($sql);
}
function encryptPassword($password)
{
    return md5($password);
}
function updateStatus($conn, $user)
{
    return mysqli_query($conn, "UPDATE users SET status = 'Active now' WHERE unique_id = {$user["unique_id"]}");
}
function loginUser($user)
{
    $_SESSION["unique_id"] = $user["unique_id"];
    echo "success";
}
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = escape($conn, $_POST["email"]);
    $password = escape($conn, $_POST["password"]);
    if (isValidEmail($email)) {
        $existingUser = fetchUserByEmail($conn, $email);
        if ($existingUser) {
            $encrypt_pass = encryptPassword($password);
            if ($encrypt_pass === $existingUser["password"]) {
                if (updateStatus($conn, $existingUser)) {
                    loginUser($existingUser);
                } else {
                    echo "An error occurred while logging in!";
                }
            } else {
                echo "The email or password is incorrect!";
            }
        } else {
            echo "The email address $email does not exist!";
        }
    } else {
        echo "The email address $email is not valid!";
    }
} else {
    echo "All input fields are required!";
}
?>