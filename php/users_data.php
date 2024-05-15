<?php
while ($data = mysqli_fetch_assoc($query)) {
    $uni_id = $data['unique_id'];
    $sql = mysqli_query($con, "select * from `messages` where (incoming_message_id = $uni_id or outgoing_message_id = $uni_id) 
    and (outgoing_message_id = $outgoing_id or incoming_message_id = $outgoing_id) order by message_id desc limit 1");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        $result = $row['message'];
    } else {
        $result = "No message available";
    }

    // hien thi k qua 28 tu o listuser
    (strlen($result) > 28) ? $message = substr($result, 0, 28) . '...' : $message = $result;

    // phan biet nguoi nhan cuoi
   // ($outgoing_id == $row['outgoing_message_id']) ? $you = "You: " : $you = "";

    // kiem tra online offline
    ($data['status'] == 'Offline now') ? $offline = "offline" : $offline = "";

    $image = $data['image'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $unique_id = $data['unique_id'];
    $output .= "<a href='chat.php?user_id={$unique_id}'>
<div class='content'>
<img src='images/$image' alt=''>
<div class='details'>
    <span>$fname $lname</span>
    <p>$message</p>
</div>
</div>
<div class='status-dot $offline'><i class='fas fa-circle'></i></div>
</a>";
}
?>