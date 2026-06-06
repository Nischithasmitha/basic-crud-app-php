<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username'");

    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password']))
    {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    }
    else
    {
        echo "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

Username:<br>
<input type="text" name="username" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<button type="submit" name="login">
Login
</button>

</form>

</body>
</html>