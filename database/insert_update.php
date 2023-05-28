<?php
$id = $_POST['id'];
$departure = $_POST['departure'];
$destination = $_POST['destination'];
$flight_date = $_POST['flight_date'];
$departure_time = $_POST['departure_time'];
$arrival_time = $_POST['arrival_time'];

$ticket_price = $_POST['ticket_price'];
$discount_tickets = $_POST['discount_tickets'];
$remaining_seats = $_POST['remaining_seats'];
$airline = $_POST['airline'];


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

// 查询航班号是否已经存在
$sql = "SELECT * FROM flights WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $manipulation = "插入";
} else {
    $manipulation = "更新";
}

// 关闭数据库连接
$conn->close();

// 显示结果界面
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>航班详情</h1>";
echo "<h3>{$manipulation}航班{$id}详情如下：</h3>";
echo "<table>";
echo "<tr>
          <th>航班号</th>
          <th>起点</th>
          <th>终点</th>
          <th>日期</th>
          <th>起飞时刻</th>
          <th>到达时刻</th>
      </tr>";

echo "<tr>";
echo "<td>{$id}</td>";
echo "<td>{$departure}</td>";
echo "<td>{$destination}</td>";
echo "<td>{$flight_date}</td>";
echo "<td>{$departure_time}</td>";
echo "<td>{$arrival_time}</td>";
echo "</tr>";

echo "<tr>
          <th>票价</th>
          <th>折扣票数</th>
          <th>剩余座位数</th>
          <th colspan=\"3\">航班所属航空公司</th>
      </tr>";

echo "<tr>";
echo "<td>{$ticket_price}</td>";
echo "<td>{$discount_tickets}</td>";
echo "<td>{$remaining_seats}</td>";
echo "<td>{$airline}</td>";
echo "</tr>";

echo "</table>";

echo "</div>";
echo "<a class=\"ref\" href=\"./main.html\">RETURN</a>";
echo "</body>";
echo "</html>";

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
