<h1 class="page-header">
    Users
    <!-- <small>Subheading</small> -->
</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Promote</th>
            <th>Demote</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        showAllUsers();
        if(isset($_GET['delete'])){
            deleteUser();
        }
        if(isset($_GET['promote'])){
            promoteUser();
        }
        if(isset($_GET['demote'])){
            demoteUser();
        }
        ?>
    </tbody>
</table>