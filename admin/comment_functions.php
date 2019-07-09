<?php
function showAllComments(){
    global $connection;
    $query = "SELECT * FROM comments";
    $all_comments = mysqli_query($connection, $query);
    if (!$all_comments) {
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($all_comments)) {
        $id = $row['comment_id'];
        $post_id = $row['comment_post_id'];
        $author = $row['comment_author'];
        $date = $row['comment_date'];
        $content = $row['comment_content'];
        $email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $post = getPost($post_id);
        $content = substr($content, 0, 100);
        // Get post name instead of id
        // $category = getCategory($category);
        // Display Data in Rows
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$date}</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>{$post}</a></td>";
        echo "<td>{$comment_status}</td>";
        echo "<td>{$content}</td>";
        echo "<td>{$email}</td>";
        echo "<td><a href='comments.php?approve={$id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$id}'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$id}'>Delete comment</a></td>";
        echo "</tr>";
    }
}

function deleteComment(){
    $comment_id = $_GET['delete'];
    global $connection;
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
    $delete = mysqli_query($connection, $query);
    header("Location: comments.php");
}

function getPost($p_id){
    global $connection;
    $post = "";
    $query = "SELECT * FROM posts WHERE post_id = {$p_id}";
    $res = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($res)){
        $post = $row['post_title'];
    }
    return $post;
}

function approveComment(){
    global $connection;
    $id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$id}";
    $approval = mysqli_query($connection, $query);
    if(!$approval){
        die(mysqli_error($connection));
    }
    header("Location: comments.php");
}

function unapproveComment(){
    global $connection;
    $id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$id}";
    $approval = mysqli_query($connection, $query);
    if(!$approval){
        die(mysqli_error($connection));
    }
    header("Location: comments.php");
}

function counterComments(){
    global $connection;
    $counter = 0;
    $query = "SELECT * FROM comments";
    $all_comments = mysqli_query($connection, $query);
    if(!$all_comments){
        die(mysqli_error($connection));
    }
    while(mysqli_fetch_assoc($all_comments)){
        $counter = $counter + 1;
    }
    echo $counter;
}

function countActiveComments(){
    global $connection;
    $counter = 0;
    $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
    $all_comments = mysqli_query($connection, $query);
    if(!$all_comments){
        die(mysqli_error($connection));
    }
    while(mysqli_fetch_assoc($all_comments)){
        $counter = $counter + 1;
    }
    echo $counter;
}

function countDraftComments(){
    global $connection;
    $counter = 0;
    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
    $all_comments = mysqli_query($connection, $query);
    if(!$all_comments){
        die(mysqli_error($connection));
    }
    while(mysqli_fetch_assoc($all_comments)){
        $counter = $counter + 1;
    }
    echo $counter;
}