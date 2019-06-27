<?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation_bar.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <!-- <small>Subheading</small> -->
                        </h1>
                        <div class="col-xs-6">
                            <form action="" method="post">
                            <?php
                                $add_res = "";
                                $output = "";
                                if(isset($_POST['submit'])){
                                    $new_cat = $_POST['cat_title'];
                                    if($new_cat == "" || empty($new_cat)){
                                        echo $output = "<h5 class='text-danger'>CAN'T HAVE EMPTY CATEGORY NAME</h5>";
                                    }
                                    else{
                                        $add_query = "INSERT INTO categories(cat_title) VALUES ('{$new_cat}')";
                                        $add_res = mysqli_query($connection, $add_query);
                                        if(!$add_res){
                                            $output = "FAILED!";
                                            echo "<h5 class='text-danger'>{$output}</h5>";
                                        }
                                        else{
                                            $output = "CATEGORY ADDED!";
                                            echo "<h5 class='text-success'>{$output}</h5>";
                                        }
                                    }
                                }
                            ?>
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                                <div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM categories";
                                        $select_all_cats = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_all_cats)){
                                            $id = $row['id'];
                                            $cat = $row['cat_title'];
                                            echo "<tr><td>{$id}</td><td>{$cat}</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>