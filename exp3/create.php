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
name VARCHAR(30) NOT NULL PRIMARY KEY,
address VARCHAR(50) NOT NULL,
zip VARCHAR(10) NOT NULL
)";

$conn->query($sql);

//创建 books 表格
$sql = "CREATE TABLE books (
book VARCHAR(30) NOT NULL PRIMARY KEY,
publisher VARCHAR(30) NOT NULL,
price FLOAT(6,2) NOT NULL
)";

$conn->query($sql);

//创建 orders 表格
$sql = "CREATE TABLE orders (
name VARCHAR(30) NOT NULL,
book VARCHAR(30) NOT NULL,
quantity INT(6) NOT NULL,
PRIMARY KEY(name, book)
)";

$conn->query($sql);

//关闭数据库连接
$conn->close();
?>
