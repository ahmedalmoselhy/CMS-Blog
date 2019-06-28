<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation_bar.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- Generate posts from the database -->
            <?php
            if (isset($_GET['c_id'])) {
                $cat_id = $_GET['c_id'];
                getCategory($cat_id);
                $query = "SELECT * FROM posts WHERE post_cat_id = {$cat_id}";
                $all_posts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($all_posts)) {
                    if(empty($row)){
                        echo "<h2 class='text-danger'>There are no posts currently in this category</h2>";
                    }
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_content = substr($row['content'], 0, 100);
                    $post_author = $row['author_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    ?>
                    <h2><a href='post.php?p_id=<?php echo $post_id; ?>'><?php echo $post_title; ?></a></h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php }
        }
        ?>


            <hr>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <?php include "includes/footer.php"; ?>