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
                            <!-- Insert a new category -->
                            <form action="" method="post">
                            <?php
                                $add_res = "";
                                $output = "";
                                if(isset($_POST['submit'])){
                                    insertCategory();
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
                            <?php if(isset($_GET['edit'])){
                                include "includes/edit_categories.php";
                            } ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Find All Categories
                                        findAllCategories();
                                    ?>
                                    <?php
                                        // Delete a category
                                        if(isset($_GET['delete'])){
                                            deleteCategory();
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