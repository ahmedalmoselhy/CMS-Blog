<?php
    function getCategory($cat_id){
        global $connection;
        $query = "SELECT * FROM categories WHERE id = {$cat_id}";
        $select_cat = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_cat)){
            $cat_name = $row['cat_title'];
            echo "<h1 class='page-header'>{$cat_name}<small> Posts</small></h1>";
        }
    }

    function commentCount(){
        global $connection;
        global $p_id;
        $query = "UPDATE posts SET comments_count = comments_count + 1 WHERE post_id ={$p_id}";
        $counter = mysqli_query($connection, $query);
        if(!$counter){
            die("FAILED!" . mysqli_error($connection));
        }
    }
?>