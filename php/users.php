<?php
session_start();
include('../includes/config.php');
$outgoing_id = $_SESSION['unique_id'];
$query = mysqli_query($con, "select *from `users` where NOT unique_id = $outgoing_id");
$output = "";

if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include('users_data.php');
}
echo $output;
?>