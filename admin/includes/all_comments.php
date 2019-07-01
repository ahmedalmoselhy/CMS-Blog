<h1 class="page-header">
    All Comments
    <!-- <small>Subheading</small> -->
</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Date</th>
            <th>Post</th>
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
        if(isset($_GET['approve'])){
            approveComment();
        }
        if(isset($_GET['unapprove'])){
            unapproveComment();
        }
        ?>
    </tbody>
</table>