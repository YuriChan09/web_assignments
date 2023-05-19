<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_order_system";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//创建数据库
$sql = "CREATE DATABASE $dbname";
$conn->query($sql);

//选择数据库
$conn->select_db($dbname);

//创建 customers 表格
$sql = "CREATE TABLE customers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
address VARCHAR(50) NOT NULL,
zip VARCHAR(10) NOT NULL
)";

$conn->query($sql);

//创建 books 表格
$sql = "CREATE TABLE books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
book VARCHAR(30) NOT NULL,
publisher VARCHAR(30) NOT NULL,
price FLOAT(6,2) NOT NULL
)";

$conn->query($sql);

//创建 orders 表格
$sql = "CREATE TABLE orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
book VARCHAR(30) NOT NULL,
quantity INT(6) NOT NULL
)";

$conn->query($sql);

//关闭数据库连接
$conn->close();
?>
