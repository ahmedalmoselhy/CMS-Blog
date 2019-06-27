<h1 class="page-header">
    All Posts
    <!-- <small>Subheading</small> -->
</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <!-- <th>Content</th> -->
            <th>Tags</th>
            <th>Comment Count</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM posts";
        $all_posts = mysqli_query($connection, $query);
        if (!$all_posts) {
            die("QUERY FAILED! " . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($all_posts)) {
            $id = $row['post_id'];
            $category = $row['post_cat_id'];
            $title = $row['post_title'];
            $author = $row['author_id'];
            $date = $row['post_date'];
            $image = $row['post_image'];
            $content = $row['content'];
            $tags = $row['post_tags'];
            $comments_count = $row['comments_count'];
            $post_status = $row['post_status'];
            // Display Data in Rows
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$category}</td>";
            echo "<td>{$title}</td>";
            echo "<td>{$author}</td>";
            echo "<td>{$date}</td>";
            echo "<td><img width='100' src='../{$image}' alt=''></td>";
            echo "<td>{$tags}</td>";
            echo "<td>{$comments_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>