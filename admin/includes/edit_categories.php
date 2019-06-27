<form action="" method="post">
    <!-- Edit a category name -->
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        // Edit a category
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = "SELECT * FROM categories WHERE id = {$edit_id}";
            $select_edit = mysqli_query($connection, $edit_query);
            while ($row = mysqli_fetch_assoc($select_edit)) {
                $id = $row['id'];
                $cat = $row['cat_title'];
                ?>


                <input value="<?php if (isset($cat)) {
                                    echo $cat;
                                } ?>" class="form-control" type="text" name="cat_edit">
            <?php }
    } ?>
        <?php
        if (isset($_POST['update'])) {
            $new_title = $_POST['cat_edit'];
            $update_query = "UPDATE categories SET cat_title = '{$new_title}' WHERE id = {$_GET['edit']}";
            $update = mysqli_query($connection, $update_query);
            if (!$update) {
                die("QUERY FAILED! " . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
    </div>
    <div>
    </div>
</form>