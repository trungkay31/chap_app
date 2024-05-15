<?php
session_start();
include('../includes/config.php');
if (!isset($_SESSION['unique_id'])) {
    header("location: ../login.php");
}else{
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if(!empty($message)){
        $insert = mysqli_query($con, "INSERT INTO `messages`(`incoming_message_id`, `outgoing_message_id`, `message`) 
        VALUES ($incoming_id,$outgoing_id,'$message')") or die();
    }
}
?>