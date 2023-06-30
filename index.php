<?php
    require './components/connection.php';
    session_start();
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
    <link rel="icon" type="image/x-icon" href="./img/logo.png">
    <title>CarZone - Main</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Swiper scripts -->
    <script src="./js/swiper-bundle.min.js" defer></script>
    <script src="./js/swiper.js" defer></script>
    <!-- Main script js -->
    <script src="./js/main.js" defer></script>

</head>

<body>
    <nav class="nav">
        <div class="wrapper">
            <a href="#" class="nav__title">
                <img src="./img/logo.png" alt="">
                Car Zone</a>
            <div class="nav__links nav__links--desktop ">
                <a href="#about-us" class="nav__item">About Us</a>
                <a href="./site/shop.html" class="nav__item">Shop</a>
                <a href="#reviews" class="nav__item">Reviews</a>
                <a href="#contact" class="nav__item">Contact</a>
            </div>
            <div class="nav__buttons nav__buttons--desktop">
                <a href="./site/login.html" class="nav__button">Log in</a>
                <a href="./site/sign-up.html" class="nav__button">Get Started</a>
            </div>
            <button class="nav__menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>
        </div>
        <div class="nav__links nav__links--mobile ">
            <a href="#about-us" class="nav__item">About Us</a>
            <a href="./site/shop.html" class="nav__item">Shop</a>
            <a href="#reviews" class="nav__item">Reviews</a>
            <a href="#contact" class="nav__item">Contact</a>
            <a href="./site/login.html" class="nav__button">Log in</a>
            <a href="./site/sign-up.html" class="nav__button">Get Started</a>
        </div>
    </nav>
    <header class="header">
        <div class="header__image">
            <div class="bg-shadow">
                <div class="text-content">
                    <h1>The best website about <br /> exclusive cars
                        <br /> in Europe
                    </h1>
                    <p>Our cars are of excellent quality. In addition, after the purchase, we </br /> guarantee a
                        one-time free
                        vulcanization in our mechanical showroom.</p>
                    <a href="./site/shop.html" class=" button">Check our shop</a>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="section about-us" id="about-us">
            <div class="section__text-box">
                <h3 class="section__title">About Us</h3>
                <h2 class="section__header">The largest selection of cars in Europe</h2>
                <p class="section__description">In our store you can buy both exclusive and ordinary cars at relatively
                    low
                    prices. <br> In addition, outside the shop, our company has a mechanical service <br> where you can,
                    among
                    other
                    things, replace tires, repair the fault at an affordable price.</p>
                <div class="about-us__icons">
                    <p class="about-us__icon"><i class="ti ti-settings-filled"></i> Great Quality</p>
                    <p class="about-us__icon"><i class="ti ti-truck"></i> Short delivery time</p>
                    <p class="about-us__icon"><i class="ti ti-users"></i> Good service </p>
                </div>
            </div>
            <img src="./img/about-us.jpg" alt="A red car (Ferrari) facing the recipient." class="about_us__image"></img>
        </section>
        <section class="section shop" id='shop'>
            <div class="section__text-box">
                <h3 class="section__title">Shop</h3>
                <h2 class="section__header">The best offers in our store</h2>
                <p class="section__description">
                    More options can be found on the shop's subpage.</p>
            </div>
            <div class="shop__cards">
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>

                    <img src="./img/offer1.webp" class="card__image">
                </div>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>
                    <img src="./img/offer2.jpg" class="card__image">
                </div>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>
                    <img src="./img/about-us.jpg" class="card__image">
                </div>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>
                    <img src="./img/offer5.jfif" class="card__image">
                </div>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>
                    <img src="./img/offer4.webp" class="card__image">
                </div>
                <div class="card">
                    <button><i class="ti ti-alert-circle"></i></button>
                    <a href="./site/car.html">Buy this car </a>
                    <div class="card__description">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                    </div>
                    <div class="card__text">
                        <p> Lamborghini Aventador LP 750-4 Superveloce Roadster</p>
                        <p> 49 000 EURO</p>
                        <p>2019</p>
                        <p>3000km</p>
                        <p>3201 cm3</p>
                    </div>
                    <img src="./img/offer3.jpg" class="card__image">
                </div>
            </div>
            <a class="more-cars" href="./site/shop.html">More</a>
        </section>
    </main>
    <section class="section swiper" id='reviews'>
        <div class="section__text-box">
            <h3 class="section__title">Reviews</h3>
            <h2 class="section__header">Feedback from our customers</h2>

        </div>
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <img src="./img/customer.jpg" class="card__img">
                    <div class="card__shadow">
                        <div class="card__text-box">
                            <p class="card__title">Elizabeth Swann</p>
                            <p class="card__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Reprehenderit, iusto obcaecati! Repudiandae odio beatae voluptate necessitatibus
                                sapiente non, debitis in!</p>
                            <p class="card__stars">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-half-filled"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <img src="./img/customer2.jpg" class="card__img">
                    <div class="card__shadow">
                        <div class="card__text-box">
                            <p class="card__title">Jan Kowalski</p>
                            <p class="card__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Reprehenderit, iusto obcaecati! Repudiandae odio beatae voluptate necessitatibus
                                sapiente non, debitis in!</p>
                            <p class="card__stars">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <img src="./img/customer3.jpg" class="card__img">
                    <div class="card__shadow">
                        <div class="card__text-box">
                            <p class="card__title">Jan Duda</p>
                            <p class="card__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Reprehenderit, iusto obcaecati! Repudiandae odio beatae voluptate necessitatibus
                                sapiente non, debitis in!</p>
                            <p class="card__stars">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <img src="./img/customer4.jpg" class="card__img">
                    <div class="card__shadow">
                        <div class="card__text-box">
                            <p class="card__title">Jack Sparrow</p>
                            <p class="card__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Reprehenderit, iusto obcaecati! Repudiandae odio beatae voluptate necessitatibus
                                sapiente non, debitis in!</p>
                            <p class="card__stars">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <img src="./img/customer5.webp" class="card__img">
                    <div class="card__shadow">
                        <div class="card__text-box">
                            <p class="card__title">Hector Barbossa</p>
                            <p class="card__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Reprehenderit, iusto obcaecati! Repudiandae odio beatae voluptate necessitatibus
                                sapiente non, debitis in!</p>
                            <p class="card__stars">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </section>
    <section class="section contact" id='contact'>
        <div class="section__text-box">
            <h3 class="section__title">Contact</h3>
            <h2 class="section__header">Have other questions?</h2>
            <p class="section__description">
                If you want to enter into cooperation, submit complaints, etc., be sure to write to us in the message
                below.</p>
        </div>
        <form action="">
            <p>Name</p>
            <input type="text" type="text" placeholder="Enter your first and last name">
            <p>Email</p>
            <input type="text" type="email" placeholder="Enter email">
            <p>Message</p>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <button type="submit">Submit</button>
        </form>
    </section>
    <footer class="footer section">
        <div class="footer__top">
            <div class="newsletter">
                <h2>CarZone</h2>
                <p>Join our newsletter to stay up to date on features and realses.</p>
                <form action="">
                    <input type="text" placeholder="Enter your email">
                    <button type="submit">Subsribe</button>
                </form>
            </div>
            <div>
                <p>Main Site</p>
                <a href="#">Home</a>
                <a href="#about-us">About us</a>
                <a href="#shop">Shop</a>
                <a href="#reviews">Reviews</a>
                <a href="#contact">Contact</a>
            </div>
            <div>
                <p>Subsite</p>
                <a href="./site/shop.html">Car Shop</a>
                <a href="./site/login.html">Log in</a>
                <a href="./site/sign-up.html">Sign in</a>
                <a href="./site/user-panel/index.html">User panel</a>
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