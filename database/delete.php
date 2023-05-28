<?php
$flight_to_delete = $_POST['flight_to_delete'];

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

// 查询航班号是否已经存在, 如果存在则删除
$sql = "SELECT * FROM flights WHERE id='$flight_to_delete'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM flights WHERE ID='$flight_to_delete'";

    if ($conn->query($sql) === false) {
        echo "插入或更新 customers 表时出错: " . $conn->error;
    }
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
echo "<h3>已删除航班：{$flight_to_delete}</h3>";

echo "</div>";
echo "<a class=\"ref\" href=\"./main.html\">RETURN</a>";
echo "</body>";
echo "</html>";

?>
