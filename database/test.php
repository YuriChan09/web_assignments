<?php
$id = 'FL001';
$departure = 'Beijing';
$destination = 'Shanghai';
$flight_date = '2023-05-28';
$departure_time = '22:27';
$arrival_time = '12:27';

$ticket_price = '250';
$discount_tickets = '5';
$remaining_seats = '2';
$airline = 'BBBBB';


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


// 将航班信息插入或更新到表中
$sql = "INSERT INTO flights (id, departure, destination, flight_date, departure_time, arrival_time, ticket_price,
discount_tickets, remaining_seats, airline)
VALUES ('$id', '$departure', '$destination', '$flight_date', '$departure_time', '$arrival_time', '$ticket_price',
'$discount_tickets', '$remaining_seats', '$airline')
ON DUPLICATE KEY UPDATE
departure = '$departure',
destination = '$destination',
flight_date = '$flight_date',
departure_time = '$departure_time',
arrival_time = '$arrival_time',
ticket_price = '$ticket_price',
discount_tickets = '$discount_tickets',
remaining_seats = '$remaining_seats',
airline = '$airline'

";

if ($conn->query($sql) === false) {
echo "插入或更新 customers 表时出错: " . $conn->error;
}



// 关闭数据库连接
$conn->close();

?>