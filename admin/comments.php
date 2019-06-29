<?php include "includes/header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation_bar.php"; ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }
                    switch ($source) {
                        case 'add_post':
                            include "includes/add_post.php";
                            break;
                        case 'edit_post':
                            include "includes/edit_post.php";
                            break;
                        default:
                            include "includes/all_comments.php";
                            break;
                    }
                    ?>
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