<?php
    // This file we use if user get some errors. It is a error page. 

    $error_message = $_GET['error'] ?? NULL;
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ooops...</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/error.css">
</head>

<body>
    <h1>Oops!</h1>
    <img src="../img/logo.png" alt="">
    <h2>We are currently experiencing technical difficulties. Please stand by</h2>
    <?php 
        if ($error_message):
    ?>
    <p><?= $error_message ?></p>
    <?php endif; ?>
    <a href="../index.php" class='btn'>Try going to homepage</a>
</body>

</html>