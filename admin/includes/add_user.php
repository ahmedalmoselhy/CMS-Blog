<h1 class="page-header">
    Create New User
    <!-- <small>Subheading</small> -->
</h1>
<?php
if (isset($_POST['submit'])) {
    createUser();
}
?>
<div class="container">
    <form class="col-xs-6" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name">
        </div>

        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" name="user_name">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="post_image">User Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="member">Member</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="submit" value="Add User">
        </div>

    </form>
</div>