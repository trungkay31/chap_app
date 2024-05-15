<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chatapp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="fname">First name</label>
                        <input type="text" class="text" name="fname" placeholder="First name" required autocomplete="off">
                    </div>
                    <div class="field input">
                        <label for="lname">Last name</label>
                        <input type="text" class="text" name="lname" placeholder="Last name" required autocomplete="off">
                    </div>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" class="text" name="username" placeholder="Enter Username" required autocomplete="off">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" class="password" name="password" placeholder="Enter password" required autocomplete="off">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" class="text" name="email" placeholder="Enter email" required autocomplete="off">
                </div>
                <div class="field image">
                    <label for="image">Image</label>
                    <input type="file" class="text" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" class="text" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>