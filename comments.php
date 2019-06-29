<!-- Comments Form -->
<?php
if (isset($_POST['submit'])) {
    $author = $_POST['comment_author'];
    $email = $_POST['comment_email'];
    $content = $_POST['comment'];
    $p_id = $post_id;

    $content = mysqli_real_escape_string($connection, $content);
    $email = mysqli_real_escape_string($connection, $email);

    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES({$p_id}, {$author}, '{$email}', '{$content}', 'unapproved', now())";
    $submit_comment = mysqli_query($connection, $query);
    if (!$submit_comment) {
        die(mysqli_error($connection));
    }
}
?>
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post">
        <div class="form-group">
            <label for="comment_author">Name</label>
            <input type="text" class="form-control" name="comment_author">
        </div>
        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" class="form-control" name="comment_email">
        </div>
        <div class="form-group">
            <label for="comment">Your Comment Here</label>
            <textarea class="form-control" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->
<?php
    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
    $comments = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($comments)){
        $comment_date = $row['comment_date'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        if($comment_status == 'approved'){
        ?>
    

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
            <small><?php echo $comment_date; ?></small>
        </h4>
        <?php echo $comment_content; ?>
    </div>
</div>
<?php } } ?>