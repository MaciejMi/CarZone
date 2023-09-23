<?php
    session_start();
    require_once('../../components/connection.php');
    require_once('../../components/getters/getUserInformation.php');
    require_once('../../components/validates/namesValidate.php');
    require_once('../../components/updates/updateAccount.php');
    require_once('../../components/errorPath.php');

    if (!isset($_SESSION['isLogged'])){
        header('Location: ../../index.php');
    }
    $user = getUserInformation($conn, $path, $_SESSION['userId']);

    $user['phone_number'] = str_replace(' ', '-', $user['phone_number']);

    $datas = array(
        'id' => $_SESSION['userId'],
        'firstname' => $_POST['firstname'] ?? NULL, 
        'lastname' => $_POST['lastname'] ?? NULL,
        'phone_number' => $_POST['phone_number'] ?? NULL,
        'description' => $_POST['description'] ?? NULL, 
        'image' => $_FILES['image'] ?? NULL
    );
    $message = updateAccount($conn, $path, $datas);
    
    $user = getUserInformation($conn, $path, $_SESSION['userId']);
    


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
    <!-- Script -->
    <script src="../../js/image-changer-input.js" defer></script>
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
        <section class="my-account">
            <form enctype="multipart/form-data"  method = "POST">
                <div class="image-input">
                <img src="data:image/png;base64 , <?= base64_encode($user['image']) ?>" alt = "your profile image" > 
                    <input type="file" name = "image">
                    <p>Zmień zdjęcie</p>
                    <div class="shadow"></div>
                </div>
                <input type="text" name = "firstname" value = "<?= $user['firstname'] ?>" placeholder="First Name" required>
                <input type="text" name = "lastname" value = "<?= $user['lastname'] ?>" placeholder="Last Name" required>
                <input type="tel" value = "<?= $user['phone_number'] ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="phone_number"
                    placeholder="Enter your phone number [fx. 123-123-123]" required>
                <textarea name = "description" placeholder="Description" required><?= $user['profile_description'] ?? '' ?></textarea>
                <button type="submit">Edit</button>
               <p><?= $message ?></p>
            </form>
        </section>
    </main>
</body>

</html>