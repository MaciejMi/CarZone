<?php
    session_start();
    require('../../components/connection.php');
    require('../../components/errorPath.php');
    require('../../components/getters/getUsersOffers.php');

    if (!isset($_SESSION['isLogged'])){
        header('Location: ../../index.php');
    }

    $userOffers = getUsersOffers($conn, $path, $_SESSION['userId']);
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
            <a href="./index.php" class="nav__profile">
            <img src="data:image/png;base64 , <?= base64_encode($_SESSION['image']) ?>" alt = "your profile image" > 
                <p><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></p>
            </a>
        </div>
    </nav>
    <main class="main">
        <section class="offers">
            <h1>Your offers</h1>
            <a href="./add-offer.php" class="add-new-btn">Add new offer!</a>
            <div class="offers__cards">
                <?php foreach($userOffers as $userOffer): ?>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <div class="btns">
                        <a href="./edit-offer.php?vin=<?= $userOffer['vin'] ?>">Edit offer </a>
                        <a href="../../components/delete/deleteOffer.php?vin=<?= $userOffer['vin'] ?>">Delete offer </a>
                    </div>
                    <div class="card__description">
                        <p> <?= $userOffer['mark'] .' '. $userOffer['model'] ?> </p>
                        <p> <?= $userOffer['price'] . ' €' ?></p>
                        <p> <?= $userOffer['type_of_body'] ?></p>
                    </div>
                    <div class="card__text">
                        <p> <?= $userOffer['mark'].' '. $userOffer['model'] ?> </p>
                        <p> <?= $userOffer['price'] . ' €' ?> </p>
                        <p> <?= $userOffer['year_of_create'] ?> </p>
                        <p> <?= $userOffer['mileage'] .' km' ?> </p>
                        <p> <?= $userOffer['tank_capacity'] . 'L' ?> </p>
                    </div>
                    <img src="data:image/png;base64 , <?= base64_encode($userOffer['image']) ?>" alt = "here you will find a photo of the car" class="card__image">
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>

</html>