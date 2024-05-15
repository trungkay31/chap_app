<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
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
        <section class="users">
            <?php
            $query = mysqli_query($con, "select * from `users` where unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);
            }
            ?>
            <header>
                <div class="content">
                    <img src="images/<?php echo $data['image'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $data['fname'] . " " . $data['lname'] ?></span>
                        <p><?php echo $data['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $data['unique_id'] ?>" class="logout">Logout</a>
            </header>

            <div class="search">
                <span class="text">Select an user to start</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="users-list">

            </div>

        </section>
    </div>

    <script src="js/users.js"></script>
</body>

</html>