<?php
include 'db.php';

if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = $_POST['role'];
if(empty($username) || empty($password))
{
    die("All fields are required");
}

if(strlen($password) < 6)
{
    die("Password must be at least 6 characters");
}

if(empty($username) || empty($password))
{
    echo "All fields are required";
}
else
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users(username,password,role) VALUES(?,?,?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $username,
        $hashed_password,
        $role
    );

    mysqli_stmt_execute($stmt);

    echo "Registration Successful!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>User Registration</h2>

<form method="POST">

    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    Role:<br>
<select name="role" required>
    <option value="editor">Editor</option>
    <option value="admin">Admin</option>
</select>
<br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>

</body>
</html>