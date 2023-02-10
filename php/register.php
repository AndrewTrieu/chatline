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
function moveUploadedFile($tempFileName, $newFileName)
{
    return move_uploaded_file($tempFileName, "assets/" . $newFileName);
}
function generateUniqueUserId()
{
    return rand(time(), 100000000);
}
function encryptPassword($password)
{
    return md5($password);
}
function fetchUserByEmail($conn, $email)
{
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    return mysqli_fetch_assoc($sql);
}
function insertUser($conn, $unique_id, $first_name, $last_name, $email, $encrypt_pass, $new_img_name)
{
    return mysqli_query($conn, "INSERT INTO users (unique_id, first_name, last_name, email, password, img, status) VALUES ({$unique_id}, '{$first_name}','{$last_name}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', 'Offline')");
}
if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $first_name = escape($conn, $_POST["first_name"]);
    $last_name = escape($conn, $_POST["last_name"]);
    $email = escape($conn, $_POST["email"]);
    $password = escape($conn, $_POST["password"]);
    if (isValidEmail($email)) {
        $existingUser = fetchUserByEmail($conn, $email);
        if ($existingUser) {
            echo "The email address $email already exists!";
        } else {
            if (isset($_FILES["image"])) {
                $img_name = $_FILES["image"]["name"];
                $img_type = $_FILES["image"]["type"];
                $temp_file_name = $_FILES["image"]["tmp_name"];
                $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                $allowedExtensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $allowedExtensions) && in_array($img_type, ["image/jpeg", "image/jpg", "image/png",])) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (moveUploadedFile($temp_file_name, $new_img_name)) {
                        $unique_id = generateUniqueUserId();
                        $encrypt_pass = encryptPassword($password);
                    } else {
                        echo "An error occurred while uploading the image.";
                        exit();
                    }
                } else {
                    echo "Image must be of the following formats: JPEG, JPG, PNG.";
                    exit();
                }
            } else {
                $unique_id = generateUniqueUserId();
                $encrypt_pass = encryptPassword($password);
            }
            if (insertUser($conn, $unique_id, $first_name, $last_name, $email, $encrypt_pass, $new_img_name)) {
                $loggedInUser = fetchUserByEmail($conn, $email);
                if (!$loggedInUser) {
                    echo "An error occurred. Please try again.";
                } else {
                    echo "success";
                }
            } else {
                echo "An error occurred. Please try again.";
            }
        }
    } else {
        echo "The email address $email is not valid!";
    }
} else {
    echo "All input fields are required!";
}
?>