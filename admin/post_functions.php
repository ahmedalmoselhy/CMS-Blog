<?php
    function showAllPosts(){
        global $connection;
        $query = "SELECT * FROM posts";
        $all_posts = mysqli_query($connection, $query);
        if (!$all_posts) {
            die("QUERY FAILED! " . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($all_posts)) {
            $id = $row['post_id'];
            $category = $row['post_cat_id'];
            $title = $row['post_title'];
            $author = $row['author_id'];
            $date = $row['post_date'];
            $image = $row['post_image'];
            $content = $row['content'];
            $tags = $row['post_tags'];
            $comments_count = $row['comments_count'];
            $post_status = $row['post_status'];
            // Get category name instead of id
            $category = getCategory($category);
            // Display Data in Rows
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$category}</td>";
            echo "<td><a href='../post.php?p_id={$id}'>{$title}</a></td>";
            echo "<td>{$author}</td>";
            echo "<td>{$date}</td>";
            echo "<td><img width='100' src='../images/{$image}' alt=''></td>";
            echo "<td>{$tags}</td>";
            echo "<td>{$comments_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><a href='posts.php?publish={$id}'>Publish</a></td>";
            echo "<td><a href='posts.php?unpublish={$id}'>Unpublish</a></td>";
            echo "<td><a href='posts.php?delete={$id}'>Delete Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&id={$id}'>Update Post</a></td>";
            echo "</tr>";
        }
    }

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
        // moving the photo
        move_uploaded_file($post_image_temp, "../images/$post_image");
        // prevent sql injection
        $post_title = mysqli_real_escape_string($connection, $post_title);
        $post_tags = mysqli_real_escape_string($connection, $post_tags);
        $post_content = mysqli_real_escape_string($connection, $post_content);

        // inserting into database
        $query = "INSERT INTO posts (post_cat_id, post_title, author_id, post_date, post_image, content, post_tags, comments_count, post_status) VALUES ({$post_category}, '{$post_title}', {$post_author}, now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";

        $posting = mysqli_query($connection, $query);
        if(!$posting){
            die("QUERY FAILED! " . mysqli_error($connection));
        }
        header("Location: posts.php");
    }

    function deletePost(){
        global $connection;
        $id = $_GET['delete'];
        $del_query = "DELETE FROM posts WHERE post_id = {$id}";
        $del_result = mysqli_query($connection, $del_query);
        deleteCommentsWithPost($id);
        if (!$del_query) {
            die("QUERY FAILED! " . mysqli_error($connection));
        }
        header("Location: posts.php");
    }

    function displayCategories(){
        global $connection;
        global $id;
        $query = "SELECT * FROM categories";
        $select_all_cats = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_cats)){
            $cat_id = $row['id'];
            $cat = $row['cat_title'];
            if($cat_id === $id){
                echo "<option value='{$cat_id}'>{$cat}</option>";
            }
            else{
                echo "<option value='{$cat_id}'>{$cat}</option>";
            }
        }
    }

    function updatePost(){
        global $connection;
        global $edit_id;

        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        // prevent sql injection
        $post_title = mysqli_real_escape_string($connection, $post_title);
        $post_tags = mysqli_real_escape_string($connection, $post_tags);
        $post_content = mysqli_real_escape_string($connection, $post_content);

        if(empty($post_image)){
            $image_query = "SELECT * FROM posts WHERE post_id = {$edit_id}";
            $select_image = mysqli_query($connection, $image_query);
            while($row = mysqli_fetch_assoc($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_cat_id = {$post_category}, ";
        $query .= "author_id = {$post_author}, ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$edit_id}";

        $update_result = mysqli_query($connection, $query);
        header("Location: posts.php");
    }

    function getCategory($cat_id){
        global $connection;
        $cat_name = "";
        $query = "SELECT * FROM categories WHERE id = {$cat_id}";
        $select_cat = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_cat)){
            $cat_name = $row['cat_title'];
        }
        return $cat_name;
    }

    function publishPost(){
        global $connection;
        $id = $_GET['publish'];
        $query = "UPDATE posts SET post_status = 'published' WHERE post_id = {$id}";
        $approval = mysqli_query($connection, $query);
        if(!$approval){
            die(mysqli_error($connection));
        }
        header("Location: posts.php");
    }
    
    function draftpost(){
        global $connection;
        $id = $_GET['unpublish'];
        $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$id}";
        $approval = mysqli_query($connection, $query);
        if(!$approval){
            die(mysqli_error($connection));
        }
        header("Location: posts.php");
    }

    function deleteCommentsWithPost($id){
        global $connection;
        $query = "DELETE FROM comments WHERE comment_post_id = {$id}";
        $delete = mysqli_query($connection, $query);
    }

    function counterPosts(){
        global $connection;
        $counter = 0;
        $query = "SELECT * FROM posts";
        $all_posts = mysqli_query($connection, $query);
        if(!$all_posts){
            die(mysqli_error($connection));
        }
        while(mysqli_fetch_assoc($all_posts)){
            $counter = $counter + 1;
        }
        echo $counter;
    }

    function countActivePosts(){
        global $connection;
        $counter = 0;
        $query = "SELECT * FROM posts WHERE post_status = 'published'";
        $all_posts = mysqli_query($connection, $query);
        if(!$all_posts){
            die(mysqli_error($connection));
        }
        while(mysqli_fetch_assoc($all_posts)){
            $counter = $counter + 1;
        }
        echo $counter;
    }

    function countDraftPosts(){
        global $connection;
        $counter = 0;
        $query = "SELECT * FROM posts WHERE post_status = 'draft'";
        $all_posts = mysqli_query($connection, $query);
        if(!$all_posts){
            die(mysqli_error($connection));
        }
        while(mysqli_fetch_assoc($all_posts)){
            $counter = $counter + 1;
        }
        echo $counter;
    }