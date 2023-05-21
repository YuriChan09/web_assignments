<?php
// 连接到数据库
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_order_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接数据库失败: " . $conn->connect_error);
}

// 处理查询请求
if (isset($_GET['customerName'])) {
    $customerName = $_GET['customerName'];

    // 查询订单信息
    $sql = "SELECT customers.name, books.book, books.publisher, orders.quantity
            FROM orders
            INNER JOIN customers ON orders.name = customers.name
            INNER JOIN books ON orders.book = books.book
            WHERE customers.name = '$customerName'
            ORDER BY FIELD(books.book, 'web_technology', 'mathematics', 'os_principle', 'matrix_theory')";

    $result = $conn->query($sql);

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";

    // 显示查询结果
    if ($result->num_rows > 0) {
        echo "<h2>Order Details for Customer: $customerName</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Book</th><th>Publisher</th><th>Quantity</th></tr>";

        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $book = $row['book'];
            $publisher = $row['publisher'];
            $quantity = $row['quantity'];

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$book</td>";
            echo "<td>$publisher</td>";
            echo "<td>$quantity</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No orders found for Customer: $customerName</p>";
    }

    // 查询客户总金额
    $sql = "SELECT SUM(books.price * orders.quantity) AS total_amount
            FROM orders
            INNER JOIN books ON orders.book = books.book
            WHERE orders.name = '$customerName'";

    $result = $conn->query($sql);

    // 显示客户总金额
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAmount = $row['total_amount'];

        echo "<p>Total Amount: $totalAmount</p>";
    }
    echo "</div>";
    echo "<a class=\"ref\" href=\"./main.html\">RETURN</a>";
    echo "</body>";
    echo "</html>";
}

// 关闭数据库连接
$conn->close();
?>
