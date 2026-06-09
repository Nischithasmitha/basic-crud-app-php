<?php
echo "<h2>Testing Database Connection</h2>";

$conn = new mysqli("localhost", "root", "", "blog");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

echo "Database Connected Successfully!";
?>