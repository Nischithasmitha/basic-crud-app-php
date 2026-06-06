<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM posts WHERE id=$id");

$post = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,
    "UPDATE posts
    SET title='$title',
    content='$content'
    WHERE id=$id");

    header("Location:index.php");
}
?>

<h2>Edit Post</h2>

<form method="POST">

Title:<br>
<input type="text"
name="title"
value="<?php echo $post['title']; ?>">

<br><br>

Content:<br>

<textarea name="content" rows="5" cols="40"><?php echo $post['content']; ?></textarea>

<br><br>

<button name="update">
Update Post
</button>

</form>