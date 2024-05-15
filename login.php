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
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="">Username</label>
                    <input type="text" class="text" name="username" placeholder="Enter Username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" class="text" name="password" placeholder="Enter password" autocomplete="off" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" class="text" name="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>

</html>