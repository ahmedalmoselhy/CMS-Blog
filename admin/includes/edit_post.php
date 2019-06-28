<h1 class="page-header">
    Update
    <!-- <small>Subheading</small> -->
</h1>
<?php
if (isset($_GET)) {
    $edit_id = $_GET['id'];
    $query = "SELECT * FROM posts WHERE post_id = {$edit_id}";
    $edit_post = mysqli_query($connection, $query);
    if (!$edit_post) {
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($edit_post)) {
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
        ?>
        <div class="container">
            <form class="col-xs-8" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" value='<?php echo $title; ?>' class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="post_category">Post category</label>
                    <select name="post_category" id="post_category">
                        <?php
                            displayCategories();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="post_author">Post Author</label>
                    <input type="text" value='<?php echo $author; ?>' class="form-control" name="post_author">
                </div>

                <div class="form-group">
                    <label for="post_status">Post Status</label>
                    <input type="text" value='<?php echo $post_status; ?>' class="form-control" name="post_status">
                </div>

                <div class="form-group">
                    <label for="post_image">Post Image</label><br>
                    <img width="100" src="../images/<?php echo $image; ?>" alt="">
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label for="post_tags">Post Tags</label>
                    <input type="text" value='<?php echo $tags; ?>' class="form-control" name="post_tags">
                </div>

                <div class="form-group">
                    <label for="post_content">Post Content</label>
                    <textarea class="form-control"  name="post_content" id="" cols="30" rows="10">
                    <?php echo $content; ?>
                    </textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="edit_post" value="Update">
                </div>

            </form>
        </div>
    <?php    }
    if(isset($_POST['edit_post'])){
        updatePost();
    }
}
?>