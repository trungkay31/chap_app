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
        <section class="chat-area">
            <?php
            $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
            $query = mysqli_query($con, "select * from `users` where unique_id = $user_id");
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);
            }
            ?>
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="images/<?php echo $data['image'] ?>" alt="">
                <div class="details">
                    <span><?php echo $data['fname'] . " " . $data['lname'] ?></span>
                    <p><?php echo $data['status'] ?></p>
                </div>
            </header>

            <div class="chat-box">
                
            </div>

            <form action="" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                <input type="text" class="input-field" name="message" placeholder="Type a message here ....">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>

        </section>
    </div>

    <script src="js/chat.js"></script>
</body>

</html>