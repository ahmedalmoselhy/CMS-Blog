<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // prevent sql injection
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_name = '{$username}'";

    $login = mysqli_query($connection, $query);
    if(!$login){
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($login)){
        $db_id = $row['user_id'];
        $db_username = $row['user_name'];
        $db_first_name = $row['first_name'];
        $db_last_name = $row['last_name'];
        $db_email = $row['email'];
        $db_image = $row['image'];
        $db_role = $row['role'];
        $db_password = $row['password'];
    }
    if($db_username !== $username || $db_password !== $password){
        header("Location: ../");
    }
    elseif ($db_username == $username && $db_password == $password) {
        $_SESSION['username'] = $db_username;
        $_SESSION['role'] = $db_role;
        $_SESSION['firstname'] = $db_first_name;
        $_SESSION['lastname'] = $db_last_name;
        header("Location: ../admin/");
    }
}