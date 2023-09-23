<?php
    session_start();

    require_once('../components/connection.php');
    require_once('../components/getters/getCarInformation.php');
    require_once('../components/getters/getCarImages.php');
    require_once('../components/setters/setNewsletter.php');
    require_once('../components/errorPath.php');
    
  

    $newsletterEmail = $_POST['newsletterEmail'] ?? NULL;

    setNewsletter($conn, $path, $newsletterEmail);

    define('VIN', $_GET['vin'] ?? NULL);

    if (!VIN){
        header('Location: ./shop.php');
    }else{
        $carInformation = getCarInformation($conn, $path, VIN);

        if (!$carInformation){
            header('Location: ./shop.php');
        }
        
        $carImages = getCarImages($conn, $path, VIN);
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
    <title>CarZone - Car</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Swiper scripts -->
    <script src="../js/swiper-bundle.min.js" defer></script>
    <script src="../js/swiper.js" defer></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Main script js -->
    <script src="../js/main.js" defer></script>
    <script src="../js/car.js" defer></script>
    <style>
        html {
            scroll-behavior: auto;
        }
    </style>
</head>

<body>

    <nav class="nav">
        <div class="wrapper">
            <a href="../index.php" class="nav__title"><img src="./../img/logo.png" alt="Red car in a circle">Car Zone</a>
            <div class="nav__links nav__links--desktop ">
                <a href="../index.php#about-us" class="nav__item">About Us</a>
                <a href="./shop.php" class="nav__item">Shop</a>
                <a href="../index.php#reviews" class="nav__item">Reviews</a>
                <a href="../index.php#contact" class="nav__item">Contact</a>
            </div>
            <div class="nav__buttons nav__buttons--desktop">
            <?php if (isset($_SESSION['isLogged'])): ?>
                    <a href="./user-panel/index.php" class = "profile_link">   <img src="data:image/png;base64 , <?= base64_encode($_SESSION['image']) ?>" alt = "your profile image" > <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?> </a>
            <?php else: ?>
                    <a href="./login.php" class="nav__button">Log in</a>
                    <a href="./sign-up.php" class="nav__button">Get Started</a>
            <?php endif;?>
            </div>
            <button class="nav__menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>
        </div>
        <div class="nav__links nav__links--mobile ">
            <a href="../index.php#about-us" class="nav__item">About Us</a>
            <a href="./shop.php" class="nav__item">Shop</a>
            <a href="../index.php#reviews" class="nav__item">Reviews</a>
            <a href="../index.php#contact" class="nav__item">Contact</a>
            <?php if (isset($_SESSION['isLogged'])): ?>
                    <a href="./user-panel/index.php" class = "profile_link">   <img src="data:image/png;base64 , <?= base64_encode($_SESSION['image']) ?>" alt = "your profile image" > <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?> </a>
            <?php else: ?>
                    <a href="./site/login.php" class="nav__button">Log in</a>
                    <a href="./site/sign-up.php" class="nav__button">Get Started</a>
            <?php endif;?>
        </div>
    </nav>
    <div class="prompt d-none">
        <button>X</button>
        <img src="../img/offer2.jpg" class="card__img">
    </div>
    <main class="main">
        <section class="section car">
            <div class="section__text-box">
                <h1 class="section__header"><?= $carInformation['mark'] . ' '.  $carInformation['model'] ?>
                </h1>
                <p class="section__description">
                  <?= $carInformation['description'] ?>
                </p>
            </div>
            <div class="info">
                <div class="cost">
                    <h2><?= $carInformation['price'] ?> €</h2>
                    <div>
                        <a href="tel: <?= $carInformation['phone_number'] ?>">Call me</a>
                    </div>
                </div>
                <a href='./account.php?userId=<?= $carInformation['id'] ?>' class="profile">
                    <div>
                        <p><?= $carInformation['firstname'] . ' ' . $carInformation['lastname'] ?></p>
                    </div>
                    <img  src="data:image/png;base64 , <?= base64_encode($carInformation['image']) ?>" alt="User profile image">
                </a>
            </div>
        </section>
        <section class="section swiper">
            <div class="section__text-box">
                <h3 class="section__header">Images</h3>
            </div>
            <div class="slide-container">
                <div class="card-wrapper swiper-wrapper">
                    <?php foreach($carImages as $carImage): ?>
                    <div class="card swiper-slide">
                    <img src="data:image/png;base64,<?= base64_encode($carImage['image']) ?>" alt="here you will find a photo of the car" class="card__img">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </section>
        <section class="section details">
            <div class="section__text-box">
                <h3 class="section__header">Details</h3>
            </div>
            <div>
                <p><span>Mark:</span><span><?= $carInformation['mark'] ?></span></p>
                <p><span>Model:</span> <span> <?= $carInformation['model'] ?></span></p>
                <p><span>Type Of Drive:</span> <span> <?= $carInformation['type_of_drive'] ?></span></p>
                <p><span>Type of body:</span> <span> <?= $carInformation['type_of_body'] ?></span></p>
                <p><span>Color:</span><span> <?= $carInformation['color'] ?></span></p>
                <p><span>Number of Doors:</span><span> <?= $carInformation['number_of_doors'] ?></span></p>
                <p><span>Tire size:</span> <span> <?= $carInformation['tire_size'] ?> </span></p>
                <p><span>Tank Capacity:</span> <span> <?= $carInformation['tank_capacity'] ?> </span></p>
            </div>
        </section>
    </main>
    <footer class="footer section">
        <div class="footer__top">
            <div class="newsletter">
                <h2>CarZone</h2>
                <p>Join our newsletter to stay up to date on features and realses.</p>
                <form method = "POST">
                    <input type="email" name = "newsletterEmail" required placeholder="Enter your email">
                    <button type="submit">Subsribe</button>
                </form>
            </div>
            <div>
                <p>Main Site</p>
                <a href="../index.php#">Home</a>
                <a href="../index.php#about-us">About us</a>
                <a href="./shop.php">Shop</a>
                <a href="../index.php#reviews">Reviews</a>
                <a href="../index.php#contact">Contact</a>
            </div>
            <div>
                <p>Subsite</p>
                <a href="./shop.php">Car Shop</a>
                <a href="./login.php">Log in</a>
                <a href="./sign-up.php">Sign in</a>
                <a href="./user-panel/index.php">User panel</a>
            </div>
            <div>
                <p>Follow us</p>
                <a href="https://www.facebook.com">Facebook</a>
                <a href="https://www.instagram.com">Instagram</a>
                <a href="https://twitter.com">Twitter</a>
                <a href="https://www.linkedin.com/">Linkedlin</a>
            </div>
        </div>
        <div class="footer__bottom">
            <p>&copy; 2023 Carzone. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>