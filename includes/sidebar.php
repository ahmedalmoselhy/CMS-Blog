<?php include "includes/db.php"; ?>
<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method = "post">
    <div class="input-group">
        <input type="text" name = "search" class="form-control">
        <span class="input-group-btn">
            <button name= "submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <?php
        $query = "SELECT * FROM categories";
        $select_all_cats = mysqli_query($connection, $query);
        
    ?>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php
                    while($row = mysqli_fetch_assoc($select_all_cats)){
                        $cat_id = $row['id'];
                        $cat = $row['cat_title'];
                        echo "<li><a href='category.php?c_id={$cat_id}'>{$cat}</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>

</div>