<?php
    session_start(); 
    require_once('../components/connection.php');
    require_once('../components/getters/getloggingInCheck.php');
    require_once('../components/errorPath.php');
     
    $getLoggingInCheck = getloggingInCheck($conn, $path, $_POST['email'] ?? NULL, $_POST['password'] ?? NULL);

    if ($getLoggingInCheck['isLogged']){
        $_SESSION['isLogged'] = true;
        $_SESSION['userId'] = $getLoggingInCheck['userId'];
        $_SESSION['email'] = $getLoggingInCheck['email'];
        $_SESSION['firstname'] = $getLoggingInCheck['firstname'];
        $_SESSION['lastname'] = $getLoggingInCheck['lastname'];
        $_SESSION['image'] = $getLoggingInCheck['image'];
    }

    if (isset($_SESSION['isLogged'])){
        header('Location: ../index.php');
    }
    
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="CarZone">
    <meta name="description" content="The best online service where you can choose your dream vehicle. ">
    <meta name="keywords" content="cars, vehicles, parts, schop, carshop">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="pl">
    <link rel="icon" type="image/x-icon" href="./../img/logo.png">
    <title>CarZone - Login</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Main script js -->
    <script src="../js/main.js" defer></script>
</head>

<body>
    <section class="section login">
        <h1>Login</h1>
        <form method = "POST">
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div>
                <div class="info"> <label for="password">Password</label> <a href="#">Forgot password?</a></div>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>
                <?php 
                    if (isset($getLoggingInCheck['message'])):
                ?>
                    <p><?= $getLoggingInCheck['message']; ?></p>
                <?php endif;?>
            </p>
            <div class="info">
                <p>Don't have account? </p> <a href="./sign-up.php"> Create new account </a>
            </div>
        </form>
    </section>
</body>

</html>