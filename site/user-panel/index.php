<?php
    session_start();

    if (!isset($_SESSION['isLogged'])){
        header('Location: ../../index.php');
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
    <link rel="icon" type="image/x-icon" href="./../../img/logo.png">
    <title>CarZone - User Panel</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/panel.css">
</head>

<body>
    <nav class="nav">
    <div class="wrapper">
            <a href="../../index.php" class="nav__title">
                <img src="../../img/logo.png" alt="carzone's logo">
                Car Zone</a>
            <a href="#" class="nav__profile">
            <img src="data:image/png;base64 , <?= base64_encode($_SESSION['image']) ?>" alt = "your profile image" > 
                <p><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></p>
            </a>
        </div>
    <header class="header">
        <div class="header__image">
            <div class="shadow">
                <h1>Welcome in User Panel
                     <span><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span>
                </h1>
            </div>
        </div>
        <div class="header__menu">
            <div class="cards">
                <a href="./my-account.php" class="card">My Account</a>
                <a href="./my-offers.php" class="card">Offers</a>
                <a href="../../components/logout.php" class="card">Log out</a>
            </div>
            <a href="../../index.php" class="btn">Main site</a>
        </div>
    </header>
</body>

</html>