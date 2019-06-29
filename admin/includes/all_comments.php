<h1 class="page-header">
    All Posts
    <!-- <small>Subheading</small> -->
</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Post</th>
            <th>Date</th>
            <th>Author</th>
            <th>Status</th>
            <th>Content</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        showAllComments();
        if(isset($_GET['delete'])){
            deleteComment();
        }
        ?>
    </tbody>
</table>