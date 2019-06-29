<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation_bar.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <?php
            $post_id = 0;
            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
                $all_posts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_content = $row['content'];
                    $post_author = $row['author_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    ?>
                    <h1><a href='post.php?p_id=<?php echo $post_id; ?>'><?php echo $post_title; ?></a></h1>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php }
        }
        ?>
            <hr>

            <!-- Blog Comments -->
            <?php include "comments.php"; ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>