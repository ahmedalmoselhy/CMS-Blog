<h1 class="page-header">
    All Posts
    <!-- <small>Subheading</small> -->
</h1>
<form action="" method="post">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select name="" id="" class="form-control">
            <option value="">Select an option</option>
            <option value="">Publish</option>
            <option value="">Draft</option>
            <option value="">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a href="add_post.php" class="btn btn-primary">Add New</a>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <!-- <th>Content</th> -->
                <th>Tags</th>
                <th>Comment Count</th>
                <th>Status</th>
                <th>Publish</th>
                <th>Unpublish</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            showAllPosts();

            if (isset($_GET['delete'])) {
                deletePost();
            }
            if (isset($_GET['publish'])) {
                publishPost();
            }
            if (isset($_GET['unpublish'])) {
                draftpost();
            }
            ?>
        </tbody>
    </table>
</form>