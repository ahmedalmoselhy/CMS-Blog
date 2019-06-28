<?php
    function createPost(){
        global $connection;
        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 0;

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts (post_cat_id, post_title, author_id, post_date, post_image, content, post_tags, comments_count, post_status) VALUES ({$post_category}, '{$post_title}', {$post_author}, '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";

        $posting = mysqli_query($connection, $query);
        if(!$posting){
            die("QUERY FAILED! " . mysqli_error($connection));
        }
        header("Location: posts.php");
    }
?>