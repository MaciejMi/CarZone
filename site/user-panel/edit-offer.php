<?php
    session_start();
    require('../../components/connection.php');
    require('../../components/getters/getCarInformation.php');
    require('../../components/updates/updateCar.php');
    require('../../components/errorPath.php');

    if (!isset($_SESSION['isLogged'])){
        header('Location: ../../index.php');
    }
    $vin = $_GET['vin'];
    if (is_null($vin)){
        header('../user-panel/index.php');
    }
    
    $datas = array(
        'mark' => $_POST['mark'] ?? NULL,
        'model' => $_POST['model'] ?? NULL,
        'year_of_create' => $_POST['year_of_create'] ?? NULL,
        'type_of_body' => $_POST['type_of_body'] ?? NULL,
        'tank_capacity' => $_POST['tank_capacity'] ?? NULL,
        'type_of_gearbox' => $_POST['type_of_gearbox'] ?? NULL,
        'type_of_drive' => $_POST['type_of_drive'] ?? NULL,
        'number_of_doors' => $_POST['number_of_doors'] ?? NULL,
        'mileage' => $_POST['mileage'] ?? NULL,
        'tire_size' => $_POST['tire_size'] ?? NULL,
        'color' => $_POST['color'] ?? NULL,
        'price' => $_POST['price'] ?? NULL,
        'description' => $_POST['description'] ?? NULL,
        'negotiative' => $_POST['negotiative'] ?? NULL,
    );
    
    $message = updateCar($conn, $path, $datas, $vin);
    
    $carInformation = getCarInformation($conn, $path, $vin);    
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
    <!-- Main script js -->
    <script src="../../js/add-file-input.js" defer></script>
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
        <section class="edit-offer">
            <h1>Edit offer <?= $carInformation['mark'] . ' ' . $carInformation['model'] ?></h1>
            <form method = "POST">
                <div class="form-container">
                    <input type="text" value = "<?= $carInformation['mark'] ?>" maxlength = "40" name='mark' placeholder="Mark" required>
                    <input type="text" value = "<?= $carInformation['model'] ?>" maxlength = "100" name='model' placeholder="Model" required>
                    <input type="number" value = "<?= $carInformation['year_of_create'] ?>"minlength = "4" maxlength = "4" min = "1945" max = "2023" name='year_of_create' placeholder="Year Of Create" required>
                    <input type="text" value = "<?= $carInformation['type_of_body'] ?>" maxlength = "15" name='type_of_body'  placeholder="Type Of Body" required>
                    <input type="number" value = "<?= $carInformation['tank_capacity'] ?>"maxlength = "3" name='tank_capacity' placeholder="Tank Capacity [L]" required>
                    <select name="type_of_gearbox" required>
                        <option value="">Type of Gearbox</option>
                        <option <?php if ($carInformation['type_of_gearbox'] == 'Automatic') { echo "selected"; } ?> value="Automatic">Automatic</option>
                        <option <?php if ($carInformation['type_of_gearbox'] == 'Semi-automatic') { echo "selected"; } ?> value="Semi-automatic">Semi-automatic</option>
                        <option <?php if ($carInformation['type_of_gearbox'] == 'Manual') { echo "selected"; } ?> value="Manual">Manual</option>
                    </select>
                    <select name="type_of_drive">
                        <option value="">Type Of Drive</option>
                        <option  <?php if ($carInformation['type_of_drive'] == 'Drive on front axle') { echo "selected"; } ?> value="Drive on front axle">Drive on front axle</option>
                        <option  <?php if ($carInformation['type_of_drive'] == 'Drive on back axle') { echo "selected"; } ?> value="Drive on back axle">Drive on back axle</option>
                        <option  <?php if ($carInformation['type_of_drive'] == 'Drive on both axles') { echo "selected"; } ?> value="Drive on both axles">Drive on both axles</option>
                    </select>
                    <input type="number" min = "1" max = "10"  value = "<?= $carInformation['number_of_doors'] ?>" name='number_of_doors' placeholder="Number of Doors" required>
                    <input type="number" name='mileage'  value = "<?= $carInformation['mileage'] ?>" placeholder="Mileage [km]" required>
                    <input type="text" maxlength = "14" name='tire_size'  value = "<?= $carInformation['tire_size'] ?>" placeholder="Tire Size" required>
                    <input type="text" maxlength = "35" name='color'  value = "<?= $carInformation['color'] ?>" placeholder="Color" required>
                    <input type="number" max = "1000000" min = "1000" name="price"  value = "<?= $carInformation['price'] ?>" placeholder="Price" required>
                   <div>
                    <p>Negotiative?</p>
                    <input type="checkbox" name="negotiative" value = "Negotiable" <?php if ($carInformation['negotiative'] == 'Negotiable') { echo "checked"; } ?>>
                   </div>
                </div>
                <textarea name="description" maxlength = "10000" placeholder="Description" required><?= $carInformation['description'] ?></textarea>
                <button type="submit">Edit</button>
            </form>
        </section>
    </main>
</body>

</html>