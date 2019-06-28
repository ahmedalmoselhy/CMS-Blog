<h1 class="page-header">
    Add Post
    <!-- <small>Subheading</small> -->
</h1>
<?php
if (isset($_POST['create_post'])) {
    createPost();
}
?>
<div class="container">
    <form class="col-xs-8" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
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
            <input type="text" class="form-control" name="post_author">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status">
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="create_post" value="Publish">
        </div>

    </form>
</div>