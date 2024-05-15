<?php
session_start();
include('../includes/config.php'); 
$outgoing_id = $_SESSION['unique_id'];
$searchTerm  = mysqli_real_escape_string($con, $_POST['searchTerm']);
$output = "";

$query = mysqli_query($con, "select * from `users` where (fname like '%$searchTerm%' or lname like '%$searchTerm%') and NOT unique_id = $outgoing_id");
if(mysqli_num_rows($query) > 0){
    include('users_data.php');
}else{
    $output .= "No user found";
}
echo $output;

?>