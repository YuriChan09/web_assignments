<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "flight_system";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//创建数据库
$sql = "CREATE DATABASE $dbname";
$conn->query($sql);

//选择数据库
$conn->select_db($dbname);

//创建 flight 表格
$sql = "CREATE TABLE flights (
id VARCHAR(10) PRIMARY KEY,
departure VARCHAR(100) NOT NULL,
destination VARCHAR(100) NOT NULL,
flight_date DATE NOT NULL,
departure_time TIME NOT NULL,
arrival_time TIME NOT NULL,
ticket_price DECIMAL(10, 2) NOT NULL,
discount_tickets INT NOT NULL,
remaining_seats INT NOT NULL,
airline VARCHAR(100) NOT NULL
)";

$conn->query($sql);

//关闭数据库连接
$conn->close();
?>
