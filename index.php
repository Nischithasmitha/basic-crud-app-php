<!DOCTYPE html>
<html>
<head>
    <title>Blog Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'db.php';

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];
}

$limit = 3;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;

$result = mysqli_query($conn,
"SELECT * FROM posts
WHERE title LIKE '%$search%'
OR content LIKE '%$search%'
LIMIT $start, $limit");
?>

<form method="GET">
    <input type="text" name="search" placeholder="Search posts...">
    <button type="submit">Search</button>
</form>

<br>

<h2>All Posts</h2>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<div class="post">

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['content']; ?></p>

<a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>

<hr>

</div>
<?php }?>
<?php

$total_result = mysqli_query($conn,
"SELECT COUNT(*) as total FROM posts");

$total_row = mysqli_fetch_assoc($total_result);

$total_posts = $total_row['total'];

$total_pages = ceil($total_posts / $limit);

for($i=1; $i<=$total_pages; $i++)
{
    echo "<a href='?page=$i'>$i</a> ";
}
?>
</body>
</html>