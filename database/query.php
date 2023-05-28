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

// 处理查询请求

$id = $_GET['id'];

// 查询订单信息
$sql = "SELECT * FROM flights WHERE id = '$id'";
$result = $conn->query($sql);

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>航班详情</h1>";
echo "<h3>{$id}详情如下：</h3>";

// Check if any rows were returned
if ($result->num_rows > 0) {
// Output the flight information in a table format
    echo "<table>
                <tr>
                    <th>航班号</th>
                    <th>起点</th>
                    <th>终点</th>
                    <th>日期</th>
                    <th>起飞时刻</th>
                    <th>到达时刻</th>
                </tr>";
// Iterate over the rows and display the first five columns
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['departure'] . "</td>
                    <td>" . $row['destination'] . "</td>
                    <td>" . $row['flight_date'] . "</td>
                    <td>" . $row['departure_time'] . "</td>
                    <td>" . $row['arrival_time'] . "</td>
                  </tr>";
    }

    echo "
                <tr>
                    
                    <th>票价</th>
                    <th>折扣票数</th>
                    <th>剩余座位数</th>
                    <th colspan='3'>航班所属航空公司</th>
                </tr>";

    // Reset the result pointer to the beginning
    $result->data_seek(0);

    // Iterate over the rows and display the remaining columns
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    
                    <td>" . $row['ticket_price'] . "</td>
                    <td>" . $row['discount_tickets'] . "</td>
                    <td>" . $row['remaining_seats'] . "</td>
                    <td colspan='3'>" . $row['airline'] . "</td>
                  </tr>";
    }

    echo "</table>";
} else {
    echo "No flight found with the provided ID.";
}
echo "</div>";
echo "<a class=\"ref\" href=\"./main.html\">RETURN</a>";
echo "</body>";
echo "</html>";
// 关闭数据库连接
$conn->close();

?>
