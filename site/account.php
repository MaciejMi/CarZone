<?php
    session_start();

    require_once('../components/connection.php');
    require_once('../components/getters/getUserInformation.php');
    require_once('../components/getters/getUsersOffers.php');
    require_once('../components/getters/getUserReviews.php');
    require_once('../components/getters/getAverageStar.php');
    require_once('../components/setters/addReview.php');
    require_once('../components/setters/setNewsletter.php');
    require_once('../components/errorPath.php');
    
    $newsletterEmail = $_POST['newsletterEmail'] ?? NULL;

    setNewsletter($conn, $path, $newsletterEmail);

    $reviewData = array(
        'description' => $_POST['description'] ?? NULL,
        'stars' => $_POST['stars'] ?? NULL,
        'authorId' => $_SESSION['userId'] ?? NULL,
        'userId' => $_GET['userId'] ?? NULL
    );

    $message = addReview($conn, $path, $reviewData);
    
    define('USER_ID', $_GET['userId'] ?? NULL);
    
    if (!USER_ID){
        header('Location: ../index.php');
    }else{
        $userInformation = getUserInformation($conn, $path, USER_ID);
        
        $usersOffers = getUsersOffers($conn, $path, USER_ID);
        
        $userReviews = getUserReviews($conn, $path, USER_ID);
        
        $averageStar = getAverageStar($conn, $path, USER_ID);
        
        if (!$userInformation){
            header('Location: ./shop.php');
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
    <title>CarZone - Maciej's account</title>
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
            <a href="../index.php" class="nav__title"><img src="./../img/logo.png"  alt="Red car in a circle">Car Zone</a>
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
    <main class="main">
        <section class="section account">
            <div>
                <div class="section__title-box">
                    <h1 class="section__title"><?= $userInformation['firstname'] . ' ' . $userInformation['lastname'] ?></h3>
                       <?php if (trim($userInformation['profile_description'])): ?>
                       <p class="section__description"><?= $userInformation['profile_description'] ?></p>
                       <?php else: ?>
                        <p class="section__description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil sunt corporis labore exercitationem omnis consequatur optio eligendi fuga blanditiis deleniti, corrupti temporibus, qui totam, quia sapiente error cum ad maxime a quidem vero hic sint saepe. Non molestiae, tempora doloremque, rem deleniti quibusdam ducimus autem sit quas excepturi, sequi necessitatibus! Tempore rem molestiae porro doloribus, nobis nam neque autem explicabo velit odio sit voluptates facere ut totam quidem laudantium. Minima cum exercitationem laborum tempore explicabo cupiditate fugiat nemo, itaque quae ratione porro accusantium eum, ipsam amet deserunt obcaecati. Quae officiis dicta cum quidem eligendi sapiente quam libero repellat laudantium voluptatum, temporibus velit eaque facere quas vel ea magnam voluptatem in eum! Voluptates modi harum a doloremque repudiandae numquam, fugiat cumque tempora odio vitae laborum natus culpa enim voluptatibus ea nam illo, distinctio totam. Assumenda, quam. Reiciendis, quae dolorum. Corrupti animi id porro nihil, delectus quibusdam quisquam, doloribus maxime neque repellat vel temporibus odit totam nesciunt consectetur magni suscipit dolore. Placeat blanditiis, minus harum soluta possimus, aut ullam facilis quos id asperiores debitis, expedita illum dolore nobis! Voluptate, quidem omnis aliquam quisquam maiores laborum sed aliquid ab minus error distinctio veritatis quaerat repellat. Praesentium facere enim est autem aliquid optio esse.</p>
                        <?php endif; ?>
                       <div class="stars">
                        <?php if ($averageStar): ?>
                            <?php for ($i = 0; $i < $averageStar; $i++): ?>
                            <i class="ti ti-star-filled"></i>
                            <?php endfor; ?>
                        <?php else: ?>
                            <p class = "not-found">None stars</p>
                        <?php endif; ?>
                        
                    
                    </div>
                </div>
                <img  src="data:image/png;base64 , <?= base64_encode($userInformation['image']) ?>" alt="User profile image">
            </div>
        </section>
        <section class="section shop">
            <div class="section__text-box">
                <h3 class="section__title">Offers</h3>
                <h2 class="section__header"><?=$userInformation['firstname'] . ' ' . $userInformation['lastname'] ?>'s Offers
                </h2>

            </div>
            <div class="shop__cards">
            <?php if ($usersOffers): ?>
                <?php foreach($usersOffers as $userOffer): ?>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./car.php?vin=<?= $userOffer['vin'] ?>">Buy this car </a>
                    <div class="card__description">
                        <p> <?= $userOffer['mark'] . ' ' .  $userOffer['model'] ?></p>
                        <p> <?= $userOffer['price'] ?> €</p>
                    </div>
                    <div class="card__text">
                        <p> <?= $userOffer['mark'] . ' ' .  $userOffer['model'] ?> </p>
                        <p> <?= $userOffer['price'] ?> € </p>
                        <p> <?= $userOffer['year_of_create'] ?></p>
                        <p> <?= $userOffer['mileage']?> km</p>
                        <p> <?= $userOffer['tank_capacity']  ?> L</p>
                    </div>

                    <img  src="data:image/png;base64 , <?= base64_encode($userOffer['image']) ?>" alt="car image" class="card__image">
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                    <p class = "not-found">Not found any offers</p>
            <?php endif; ?>
            </div>
        </section>
        <section class="section opinions">
            <div class="section__text-box">
                <h3 class="section__title">Opinions</h3>
                <h2 class="section__header">Opinions about <?= $userInformation['lastname'] . '\'  s' ?>
                </h2>
            </div>
            <?php if ($userReviews): ?>
            <?php foreach($userReviews as $userReview): ?>
            <div class="comments">
                <a href="#">
                <img  src="data:image/png;base64 , <?= base64_encode($userReview['image']) ?>" alt="User profile image">
                    <p class="comments__name"><?= $userReview['firstname'] . ' ' . $userReview['lastname'] ?></p>
                </a>
                <div class="comments__content">
                    <p><?= $userReview['descript'] ?></p>
                    <div>
                        <?php for ($i = 0; $i < $userReview['star']; $i++): ?>
                        <i class="ti ti-star-filled"></i>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
                    <p class = "not-found">Not found any reviews</p>
            <?php endif; ?>
        </section>
        <?php if (isset($_SESSION['isLogged'])): ?>
            <?php if ($_SESSION['userId'] != $_GET['userId']): ?>
            <section class="section add-comment">
                <div class="section__text-box">
                    <h3 class="section__title">Form</h3>
                    <h2 class="section__header">Your opinion about this user
                        </h2>
                        <form method = "POST">
                            <textarea name = "description"></textarea>
                            <input type="number" min="1" max="5" name="stars" placeholder="Enter your opinion in stars">
                            <button class="btn" type="submit">
                                Send your comment
                            </button>
                        </form>
                        <?php if(isset($message)): ?>
                            <p class = "error"><?= $message ?></p>
                        <?php endif; ?>
                    </div>
                </section>
                <?php endif; ?>
         <?php endif; ?>
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