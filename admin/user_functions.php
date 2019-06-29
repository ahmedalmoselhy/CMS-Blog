<?php
function showAllUsers()
{
    global $connection;
    $query = "SELECT * FROM users";
    $all_users = mysqli_query($connection, $query);
    if (!$all_users) {
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($all_users)){
        $id = $row['user_id'];
        $username = $row['user_name'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $image = $row['image'];
        $role = $row['role'];
        // Display Data in Rows
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td><a href='../user.php?u_id={$id}'>{$username}</a></td>";
        echo "<td>{$first_name}</td>";
        echo "<td>{$last_name}</td>";
        echo "<td>{$email}</td>";
        echo "<td><img width='100' src='../images/{$image}' alt=''></td>";
        echo "<td>{$role}</td>";
        echo "<td><a href='users.php?delete={$id}'>Delete User</a></td>";
        echo "<td><a href='users.php?source=edit_user&id={$id}'>Update User</a></td>";
        echo "</tr>";
    }
}

function createUser(){
    global $connection;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    $email = $_POST['email'];
    $role = $_POST['role'];

    // preventing sql injection
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);
    $user_name = mysqli_real_escape_string($connection, $user_name);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);

    // move image
    move_uploaded_file($image_temp, "../images/$image");

    $query = "INSERT INTO users (user_name, password, first_name, last_name, email, image, role) ";
    $query .= "VALUES ('{$user_name}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$image}', '{$role}')";

    $add_user = mysqli_query($connection, $query);
    if(!$add_user){
        die("QUERY FAILED! " . mysqli_error($connection));
    }
}