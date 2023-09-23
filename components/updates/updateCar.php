<?php

    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param datas - this is array with datas which we want to update 
     */

    function updateCar($conn, $path, $datas, $vin_a){
        try{
            if (is_null($datas['negotiative'])){
                $datas['negotiative'] = 'Not negotiable';
            }
            foreach($datas as $data){
                if (is_null($data)){
                    return "You didn't complete everything!";
                }
            }
            $vin = $vin_a ?? NULL;
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

            

            $query = "UPDATE cars SET cars.model = '$model', cars.mark = '$mark', cars.year_of_create = '$year_of_create', cars.type_of_body = '$type_of_body',
            cars.tank_capacity = '$tank_capacity', cars.type_of_gearbox = '$type_of_gearbox', cars.type_of_drive = '$type_of_drive', cars.number_of_doors = '$number_of_doors', cars.mileage = '$mileage', cars.tire_size = '$tire_size', cars.color = '$color', cars.price = '$price', cars.description = '$description', cars.negotiative = '$negotiative' WHERE cars.vin = '$vin';";

            $stmt = $conn -> query($query);

            header('Location: ./index.php');

            return;
        }catch(PDOException $error){
            return 'You cannot change yoour car\'s data!';
        }
    }
?>