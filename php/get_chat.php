<?php
session_start();
include('../includes/config.php');
if (!isset($_SESSION['unique_id'])) {
    header("location: ../login.php");
} else {
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $output = "";

    $select = mysqli_query($con, "select * from `messages` 
    left join `users` on users.unique_id = messages.incoming_message_id
    where (outgoing_message_id = $outgoing_id and incoming_message_id = $incoming_id) 
    or (outgoing_message_id = $incoming_id and incoming_message_id = $outgoing_id) order by message_id");
    if (mysqli_num_rows($select) > 0) {
        while ($msg = mysqli_fetch_array($select)) {
            $mess = $msg['message'];
            $data = mysqli_fetch_array(mysqli_query($con, "select image from `users` where unique_id = $incoming_id"));
            $img = $data['image'];
            if ($msg['outgoing_message_id'] === $outgoing_id) { //sender
                $output .= "<div class='chat outgoing'>
                <div class='details'>
                    <p>$mess</p>
                </div>
            </div>";
            } else { // receiver
                $output .= "<div class='chat incoming'>
                <img src='images/$img' alt=''>
                <div class='details'>
                    <p>$mess</p>
                </div>
            </div>";
            }
        }
    }
    echo $output;
}
