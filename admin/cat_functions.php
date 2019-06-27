<?php
function insertCategory(){
    global $connection;
    $new_cat = $_POST['cat_title'];
    if ($new_cat == "" || empty($new_cat)) {
        echo $output = "<h5 class='text-danger'>CAN'T HAVE EMPTY CATEGORY NAME</h5>";
    } else {
        $add_query = "INSERT INTO categories(cat_title) VALUES ('{$new_cat}')";
        $add_res = mysqli_query($connection, $add_query);
        if (!$add_res) {
            $output = "FAILED!";
            echo "<h5 class='text-danger'>{$output}</h5>";
        } else {
            $output = "CATEGORY ADDED!";
            echo "<h5 class='text-success'>{$output}</h5>";
        }
    }
}

function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_cats = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_cats)){
        $id = $row['id'];
        $cat = $row['cat_title'];
        echo "<tr><td>{$id}</td><td>{$cat}</td><td><a href='categories.php?delete={$id}'>Delete</a></td><td><a href='categories.php?edit={$id}'>Update</a></td></tr>";
    }
}

function deleteCategory(){
    global $connection;
    $del_id = $_GET['delete'];
    $del_query = "DELETE FROM categories WHERE id = {$del_id}";
    $del_result = mysqli_query($connection, $del_query);
    header("Location: categories.php");
}


?>