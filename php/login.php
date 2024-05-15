<?php
session_start();
include('../includes/config.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if (!empty($username) && !empty($password)) {
    $login = mysqli_query($con, "select * from `users` where username = '$username'");
    if (mysqli_num_rows($login) > 0) {
        $data = mysqli_fetch_array($login);
        if (password_verify($password, $data['password'])) {
            $status = "Active now";
            $update = mysqli_query($con, "update `users` set status = '$status' where username = '$username'");
            if ($update) {
                $_SESSION['unique_id'] = $data['unique_id'];
                echo "success";
            }
        } else {
            echo "Password is wrong!";
        }
    } else {
        echo "Username not exist!";
    }
} else {
    echo "Fill all input!";
}
