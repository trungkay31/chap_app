<?php
session_start();
include('../includes/config.php');
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$email = mysqli_real_escape_string($con, $_POST['email']);

if (!empty($fname) && !empty($lname) && !empty($username) && !empty($password) && !empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // check la dang email
        $query = mysqli_query($con, "select * from `users` where email = '$email'");
        $email_data = mysqli_num_rows($query);
        if ($email_data == 0) {
            if (isset($_FILES['image'])) { // da upload anh
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];

                $image_exp = explode('.', $image);
                $image_ext = end($image_exp);

                $extension = ['png', 'jpeg', 'jpg'];

                if (in_array($image_ext, $extension) === true) {
                    $time = time();
                    $new_image = $time . $image;

                    if (move_uploaded_file($image_tmp, "../images/" . $new_image)) {
                        $hash_password = password_hash($password, PASSWORD_DEFAULT);
                        $status = "Active now";
                        $rand_id = rand(time(), 10000000);

                        $insert_user = mysqli_query($con, "INSERT INTO `users`(`unique_id`, `fname`, `lname`, `username`, `password`, `email`, `image`, `status`) 
                        VALUES ($rand_id,'$fname','$lname','$username','$hash_password','$email','$new_image','$status')");
                        if ($insert_user) {
                            $login = mysqli_query($con, "select * from `users` where username = '$username'");
                            if (mysqli_num_rows($login) > 0) {
                                $data = mysqli_fetch_array($login);
                                $_SESSION['unique_id'] = $data['unique_id'];
                                echo "success";
                            } else {
                                echo "Something went wrong!";
                            }
                        } else {
                            echo "Something went wrong!";
                        }
                    }
                } else {
                    echo "Please select an image - .png, .jpeg, .jpg!";
                }
            } else {
                echo "Please select image to signup!";
            }
        } else {
            echo "$email already exist! Please choose another email to signup!";
        }
    } else {
        echo "$email - This not a valid email";
    }
} else {
    echo "Fill all input!";
}

?>
