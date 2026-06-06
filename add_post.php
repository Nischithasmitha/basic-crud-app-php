<?php
include 'db.php';

if(isset($_POST['save']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,
    "INSERT INTO posts(title,content)
     VALUES('$title','$content')");

    echo "Post Added Successfully!";
}
?>

<h2>Add New Post</h2>

<form method="POST">

Title:<br>
<input type="text" name="title" required><br><br>

Content:<br>
<textarea name="content" rows="5" cols="40"></textarea><br><br>

<button type="submit" name="save">
Save Post
</button>

</form>