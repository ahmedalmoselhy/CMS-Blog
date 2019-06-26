<?php include "includes/db.php"; ?>
<!-- Header -->
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation_bar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- Generate posts from the database -->
                <?php
                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                        $results = mysqli_query($connection, $query);
                        if(!$results){
                            die("QUERY FAILED! " . mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($results);
                        if($count == 0){
                        echo "<h3>No Results!</h3>";
                        }
                    
                    while($row = mysqli_fetch_assoc($results)){
                        $post_title = $row['post_title'];
                        $post_content = $row['content'];
                        $post_author = $row['author_id'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        ?>
                        <h2><a href='#'><?php echo $post_title; ?></a></h2>
                        <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php }
                    } ?>
                
                

                <hr>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include "includes/footer.php"; ?>