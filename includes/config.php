<?php
$con = mysqli_connect("localhost","root","","chat_app");
if(!$con){
    echo "Error" . mysqli_connect_error();
}
?>