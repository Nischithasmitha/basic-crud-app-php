<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<a href="add_post.php">Add Post</a><br><br>

<a href="index.php">View Posts</a><br><br>

<a href="logout.php">Logout</a>