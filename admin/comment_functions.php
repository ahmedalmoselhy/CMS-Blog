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
        $post = $row['comment_post_id'];
        $author = $row['comment_author'];
        $date = $row['comment_date'];
        $content = $row['comment_content'];
        $email = $row['comment_email'];
        $comment_status = $row['comment_status'];

        $content = substr($content, 0, 100);
        // Get post name instead of id
        // $category = getCategory($category);
        // Display Data in Rows
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$date}</td>";
        echo "<td>{$post}</td>";
        echo "<td>{$comment_status}</td>";
        echo "<td>{$content}</td>";
        echo "<td>{$email}</td>";
        echo "<td><a href='#'>Approve</a></td>";
        echo "<td><a href='#'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$id}'>Delete comment</a></td>";
        echo "</tr>";
    }
}

function deleteComment(){

}