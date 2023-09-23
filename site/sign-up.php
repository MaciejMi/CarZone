<?php
  error_reporting(E_ERROR | E_PARSE);
  session_start(); 
  require_once('../components/connection.php');
  require_once('../components/getters/getloggingInCheck.php');
  require_once('../components/setters/addAcount.php');
  require_once('../components/validates/namesValidate.php');
  require_once('../components/validates/emailsValidate.php');
  require_once('../components/errorPath.php');
  
  $datas = array(
    'lastname' => trim($_POST['lastname']) ?? NULL,
    'firstname' => trim($_POST['firstname']) ?? NULL,
    'email' => trim($_POST['email']) ?? NULL,
    'phone_number' => trim($_POST['phone_number']) ?? NULL,
    'password_1' => trim($_POST['password_1']) ?? NULL,
    'password_2' => trim($_POST['password_2']) ?? NULL,
    'image' => $_FILES['profile_image'] ?? NULL
  );

  $message = addAcount($conn, $path, $datas)

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
    <title>CarZone - Sign Up</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Main script js -->
    <!-- <script src="../js/main.js" defer></script> -->
</head>

<body>
    <section class="section login">
        <h1>Sign up</h1>
        <form method='POST' action='./sign-up.php' enctype="multipart/form-data">
            <div>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" minlength='2' maxlength='80' placeholder="Enter your last name"
                    required>
            </div>
            <div>
                <label for="firstname">First name</label>
                <input type="text" name="firstname" minlength='2' maxlength='80' placeholder="Enter your first name"
                    required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" minlength='5' maxlength='80' placeholder="Enter your email" required>
            </div>
            <div>
                <label for="phone_number">Phone number (123-123-123)</label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="phone_number"
                    placeholder="Enter your phone number [fx. 123-123-123]" required>
            </div>
            <div>
                <label for="password_1">Password</label>
                <input type="password" name="password_1" minlength='8' maxlength="80" placeholder="Enter your password"
                    required>
            </div>
            <div>
                <label for="password_2">Password</label>
                <input type="password" name="password_2" minlength='8' maxlength="80" placeholder="Enter your password"
                    required>
            </div>
            <div>
                <label for="password_2">Profile image</label>
                <input type="file" name="profile_image" required>
            </div>
            <?php if (isset($message)): ?>
            <p class="error"><?= $message ?></p>
            <?php endif; ?>
            <button type="submit" class="btn">Sign in</button>
            <div class="info">
                <p>Do you have an account? </p> <a href="./login.php"> Login </a>
            </div>
        </form>
    </section>
</body>

</html>