<h1 class="page-header">
    Edit Existing User
    <!-- <small>Subheading</small> -->
</h1>
<?php
$user_id = $_GET['id'];
$query = "SELECT * FROM users WHERE user_id = {$user_id}";
$all_users = mysqli_query($connection, $query);
if (!$all_users) {
    die("QUERY FAILED! " . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($all_users)) {
    $id = $row['user_id'];
    $username = $row['user_name'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $image = $row['image'];
    $role = $row['role'];
    $password = $row['password'];
    ?>
    <div class="container">
        <form class="col-xs-6" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value=<?php echo $first_name; ?>>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value=<?php echo $last_name; ?>>
            </div>

            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" name="user_name" value=<?php echo $username; ?>>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value=<?php echo $password; ?>>
            </div>

            <div class="form-group">
                <label for="post_image">User Image</label><br>
                <img src="../images/<?php echo $image; ?>" alt="PHOTO" width="100">
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value=<?php echo $email; ?>>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" name="submit" value="Update User">
            </div>

        </form>
    </div>
<?php
}
if (isset($_POST['submit'])) {
    updateUser();
}
?>