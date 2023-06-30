<?php
    session_start();
    require_once '../components/connection.php';
    require '../components/authentication.php';
    
    if (!isset($_SESSION['logged']))
    {
        $_SESSION['logged'] = false;    
    }else{
        if ($_SESSION['logged']){
            header('Location: ../index.php');
        }
    }
    
    if (isset($_GET['token']) && isset($_GET['email'])){

        $query_str = "SELECT users.email FROM users WHERE users.verification_code = " . $_GET['token'] . ";"; 
        $query = $conn -> query($query_str);
        $result = $query -> fetch();
        if ($result){
            $query_str = "UPDATE users SET users.status = 1 WHERE users.email ='" . $_GET['email'] . "';";
            $conn -> query($query_str);
            header("Location: ./login.php?message=Your email have been verificated!");
        }
    }

    
    $email = trim($_POST['email'] ?? NULL) ;
    $password = trim($_POST['password'] ?? NULL);

    if (!(is_null($email) || is_null($password))){
        $query_str = "SELECT users.passhash FROM users WHERE users.status = 1 AND users.email ='" . $email . "';";
        $query = $conn -> query($query_str);
        $result = $query->fetch();
        if ($result){
            if(password_verify($password, $result[0])){
                $_SESSION['logged'] = true;
                header('Location: ../index.php');
            }
        }
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
                    if (isset($_GET['message'])):
                ?>
                    <p><?= $_GET['message'] ?></p>
                <?php endif;?>
            </p>
            <div class="info">
                <p>Don't have account? </p> <a href="./sign-up.html"> Create new account </a>
            </div>
        </form>
    </section>
</body>

</html>