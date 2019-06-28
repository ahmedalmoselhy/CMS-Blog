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
?>