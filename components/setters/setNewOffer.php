<?php

function setNewOffer($conn, $path, $datas, $images){
    try{
        if (is_null($datas['negotiative'])){
            $datas['negotiative'] = 'Not negotiable';
        }
        foreach($datas as $data){
            
            if (is_null($data)){
                return "You didn't complete everything!";
            }
        }
        $vin = $datas['vin'];
        $model = $datas['model'];
        $mark = $datas['mark'];
        $year_of_create = $datas['year_of_create'];
        $type_of_body = $datas['type_of_body'];
        $tank_capacity = $datas['tank_capacity'];
        $type_of_gearbox = $datas['type_of_gearbox'];
        $type_of_drive = $datas['type_of_drive']; 
        $number_of_doors = $datas['number_of_doors'];
        $mileage = $datas['mileage'];
        $tire_size = $datas['tire_size'];
        $color = $datas['color'];
        $price = $datas['price'];
        $description = $datas['description'];
        $negotiative = $datas['negotiative'];

        $query = "INSERT INTO cars(vin, model, mark, year_of_create, type_of_body, tank_capacity, type_of_gearbox, type_of_drive, number_of_doors, mileage, tire_size, color, price, description, negotiative) VALUES('$vin', '$model', '$mark', '$year_of_create', '$type_of_body', '$tank_capacity', '$type_of_gearbox', '$type_of_drive', '$number_of_doors', '$mileage', '$tire_size', '$color', '$price', '$description', '$negotiative');";

        $stmt = $conn -> query($query);

        $id = $_SESSION['userId'];

        $query = "INSERT INTO payments(users_id, cars_vin) VALUES ($id , '$vin');";
        
        $stmt = $conn -> query($query);

        foreach($images as $image){
            $tmp_img = file_get_contents($image['tmp_name']);

            $query = $conn->prepare("INSERT INTO images(image, cars_id) VALUES ( ? , '$vin');");
            $query->bindParam(1, $tmp_img);
            $query->execute();
        }

        return;
    }catch(PDOException $error){
        return 'You cannot add new car!';
    }
}
?>