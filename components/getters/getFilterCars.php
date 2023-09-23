<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param filter - filter
     * getFilterCars function task is returning cars to our page from database.
     */

    function getFilterCars ($conn, $path, $filter){
        try{

            $query = "SELECT * FROM cars LEFT OUTER JOIN images ON images.cars_id = cars.vin";

            $where_sentence = ' WHERE';

            $filter['minimum-cost'] *= 1000;
            $filter['maximum-cost'] *= 1000;

            if ($filter['maximum-cost'] == '0'){
                $filter['maximum-cost'] = 1000000;
            }

            foreach($filter as $key => $value){
               
                if (!is_null($value)){
                    if ($value != ''){
                        if ($where_sentence == ' WHERE'){
                            if ($key == "minimum-cost"){
                                $where_sentence .= " cars.price >= {$value} ";
                            }elseif($key == "maximum-cost"){
                                $where_sentence .= " cars.price <= {$value} ";
                            }
                            elseif($key == 'negotiative'){
                                $negotiative_value = $value == 1 ? 'Negotiable' : 'Not negotiable';
                                
                                $where_sentence .= " cars.negotiative = " . $negotiative_value . " ";
                            }
                            else{
                                $where_sentence .= " cars.{$key} = '$value' ";
                            }
                        }else{
                            if ($key == "minimum-cost"){
                                $where_sentence .= "AND cars.price >= {$value} ";
                            }elseif($key == "maximum-cost"){
                                $where_sentence .= "AND cars.price <= {$value} ";
                            }
                            elseif($key == 'negotiative'){
                                $negotiative_value = $value == 1 ? 'Negotiable' : 'Not negotiable';
                                $where_sentence .= "AND cars.negotiative = '" . $negotiative_value . "' ";
                            }
                            else{
                                $where_sentence .= "AND cars.{$key} = '$value' ";
                            }
                        }
                    }
                }
            }   

            if ($where_sentence != ' WHERE'){
                $query .= $where_sentence;
            }

            $query .= "GROUP BY cars.vin;";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();
            
            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>