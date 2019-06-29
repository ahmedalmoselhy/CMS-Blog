<h1 class="page-header">
    All Posts
    <!-- <small>Subheading</small> -->
</h1>
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

        if(isset($_GET['delete'])){
            deletePost();
        }
        if(isset($_GET['publish'])){
            publishPost();
        }
        if(isset($_GET['unpublish'])){
            draftpost();
        }
        ?>
    </tbody>
</table>