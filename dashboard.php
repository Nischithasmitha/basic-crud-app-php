<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>

<h2>
    Welcome <?php echo $_SESSION['user']; ?>
</h2>

<p>
    Role: <?php echo $_SESSION['role']; ?>
</p>

<?php
if($_SESSION['role'] == "admin")
{
?>
    <a href="add_post.php">Add Post</a><br><br>
    <a href="index.php">View Posts</a><br><br>

<?php
}
else
{
?>
    <a href="index.php">View Posts</a><br><br>

<?php
}
?>

<a href="logout.php">Logout</a>