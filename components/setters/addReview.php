<?php

    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param reviewData - this is array with datas about review (description, stars, userId, authorId)
     */

    function addReview($conn, $path, $reviewData){
        try{
            if ($reviewData['userId'] == $reviewData['authorId']){
                return 'You can\'t review yourself!';
            }
            foreach($reviewData as $data){
                if (is_null($data)){
                    return;
                }
            }

            $description = $reviewData['description'];
            $stars = $reviewData['stars'];
            $user_id = $reviewData['userId'];
            $author_id = $reviewData['authorId'];

            $query = "INSERT INTO reviews(descript, star, user_id, author_id) VALUES('{$description}', '{$stars}', '{$user_id}', '{$author_id}') ";
            $stmt = $conn -> query($query);

        }catch(PDOException $error){
            return 'You cannot review the same user!';
        }
    }
?>