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
