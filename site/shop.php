<?php
    session_start();
    require_once('../components/connection.php');
    require_once('../components/getters/getCars.php');
    require_once('../components/getters/getInfoAboutCar.php');
    require_once('../components/getters/getFilterCars.php');
    require_once('../components/setters/setNewsletter.php');
    require_once('../components/errorPath.php');
    
    $newsletterEmail = $_POST['newsletterEmail'] ?? NULL;

    setNewsletter($conn, $path, $newsletterEmail);

    $cars = getCars($conn, $path);
    $infoAboutMark = getInfoAboutCar($conn, $path, 'mark');
    $infoAboutModel = getInfoAboutCar($conn, $path, 'model');
    $infoAboutYearOfCreate = getInfoAboutCar($conn, $path, 'year_of_create');
    $infoAboutTypeOfBody = getInfoAboutCar($conn, $path, 'type_of_body');
    $infoAboutTypeOfDrive = getInfoAboutCar($conn, $path, 'type_of_drive');
    $infoAboutColor = getInfoAboutCar($conn, $path, 'color');
    $infoAboutTireSize = getInfoAboutCar($conn, $path, 'tire_size');

    $filter = array(
        'mark' => $_GET['mark'] ?? NULL,
        'model' => $_GET['model'] ?? NULL,
        'year_of_create' => $_GET['year_of_create'] ?? NULL,
        'type_of_body' => $_GET['type_of_body'] ?? NULL,
        'type_of_drive' => $_GET['type_of_drive'] ?? NULL,
        'color' => $_GET['color'] ?? NULL,
        'tire_size' => $_GET['tire_size'] ?? NULL,
        'number_of_doors' => $_GET['number_of_doors'] ?? NULL,
        'minimum-cost' => $_GET['minimum-cost'] ?? NULL,
        'maximum-cost' => $_GET['maximum-cost'] ?? NULL,
        'negotiative' => $_GET['negotiative'] ?? NULL,
    );

    $filterCars = getFilterCars($conn, $path, $filter);
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
    <title>CarZone - Shop</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Main script js -->
    <script src="../js/shop.js" defer></script>
    <script src="../js/main.js" defer></script>
</head>

<body>
    <nav class="nav">
        <div class="wrapper">
            <a href="../index.php" class="nav__title">
            <img src="./../img/logo.png" alt="Red car in a circle">Car Zone</a>
            <div class="nav__links nav__links--desktop ">
                <a href="../index.php#about-us" class="nav__item">About Us</a>
                <a href="#" class="nav__item">Shop</a>
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
            <a href="#" class="nav__item">Shop</a>
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
    <header class="header header--shop">
        <div class="header__image">
            <div class="bg-shadow">
                <div class="text-content">
                    <h1>Car Shop
                    </h1>
                    <p>Our cars are of excellent quality. In addition, after the purchase, we guarantee a one-time free
                        vulcanization in our mechanical showroom
                    </p>
                    <a href="../index.php" class=" button ">Main Site</a>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="section shop-filter">
            <div class="section__text-box">
                <h3 class="section__title">Shop Filter</h3>
            </div>
            <form action = "./shop.php" method = "GET">
                <div>
                    <p>Mark</p>
                    <select name="mark">
                        <option value="">-</option>
                        <?php foreach($infoAboutMark as $mark): ?>
                            <option value="<?= $mark[0] ?>"> <?= $mark[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Model</p>
                    <select name="model">
                        <option value="">-</option>
                    <?php foreach($infoAboutModel as $model): ?>
                            <option value="<?= $model[0] ?>"> <?= $model[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Year Of Create</p>
                    <select name="year_of_create">
                        <option value="">-</option>
                        <?php foreach($infoAboutYearOfCreate as $year): ?>
                            <option value="<?= $year[0] ?>"> <?= $year[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Type of body</p>
                    <select name="type_of_body">
                        <option value="">-</option>
                        <?php foreach($infoAboutTypeOfBody as $typeOfBody): ?>
                            <option value="<?= $typeOfBody[0] ?>"> <?= $typeOfBody[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Type Of Drive</p>
                    <select name="type_of_drive">
                        <option value="">-
                        </option>
                        <?php foreach($infoAboutTypeOfDrive as $typeOfDrive): ?>
                            <option value="<?= $typeOfDrive[0] ?>"> <?= $typeOfDrive[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Color</p>
                    <select name="color">
                        <option value="">-
                        </option>
                        <?php foreach($infoAboutColor as $color): ?>
                            <option value="<?= $color[0] ?>"> <?= $color[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
              
                <div>
                    <p>Tire Size</p>
                    <select name="tire_size">
                        <option value="">-</option>
                        <?php foreach($infoAboutTireSize as $tireSize): ?>
                            <option value="<?= $tireSize[0] ?>"> <?= $tireSize[0] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <p>Number Of Doors</p>
                    <input type="number" name="number_of_doors" placeholder="Enter number of doors in your car">
                </div>
            
                <div>
                    <p class="minimum_cost_output">Minimum cost </p>
                    <input type="range" min="1" max="1000" value="1" name="minimum-cost" class="minimum_cost_input">
                </div>
                <div>
                    <p class="maximum_cost_output">Maximum cost</p>
                    <input type="range" min="1" max="1000" value="1000" name="maximum-cost" class="maximum_cost_input">
                </div>
                <div>
                    <p>Negotiative</p>
                    <input type="checkbox" name="negotiative" value = "1">
                </div>
                <button type="Search">Search</button>
            </form>
        </section>
        <section class="section shop">
            <div class="section__text-box">
                <h3 class="section__title">Shop</h3>
                <h2 class="section__header">Offers best suited to your preferences
                </h2>
            </div>
            <div class="shop__cards">
                <?php if ($filterCars): ?>
                    <?php foreach($filterCars as $car): ?>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./car.php?vin=<?= $car['vin'] ?>">Buy this car </a>
                    <div class="card__description">
                        <p> <?= $car['mark'] .' '. $car['model'] ?> </p>
                        <p> <?= $car['price'] . ' €' ?></p>
                        <p> <?= $car['type_of_body'] ?></p>
                    </div>
                    <div class="card__text">
                        <p> <?= $car['mark'].' '. $car['model'] ?> </p>
                        <p> <?= $car['price'] . ' €' ?> </p>
                        <p> <?= $car['year_of_create'] ?> </p>
                        <p> <?= $car['mileage'] .' km' ?> </p>
                        <p> <?= $car['tank_capacity'] . 'L' ?> </p>
                    </div>
                    <img src="data:image/png;base64,<?= base64_encode($car['image']) ?>" alt="here you will find a photo of the car" class="card__image">
                </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <h2>No cars found with these filters</h2>
                <?php endif; ?>
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
                <a href="#">Shop</a>
                <a href="../index.php#reviews">Reviews</a>
                <a href="../index.php#contact">Contact</a>
            </div>
            <div>
                <p>Subsite</p>
                <a href="#">Car Shop</a>
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