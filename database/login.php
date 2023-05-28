<?php
// 连接到数据库
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "flight_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接数据库失败: " . $conn->connect_error);
}

// 获取post的用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];

// 与数据库内的核对
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if a matching row was found
if ($result->num_rows > 0) {
    // Username and password are correct, redirect to main.html
    header("Location: main.html");
} else {
    // Invalid username or password, redirect back to index.html
    header("Location: index.html");
}

// Close the database connection
$conn->close();
?>
