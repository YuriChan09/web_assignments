<?php
$name = $_POST['name'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$web_technology_quantity = $_POST['web_technology_quantity'];
$mathematics_quantity = $_POST['mathematics_quantity'];
$os_principle_quantity = $_POST['os_principle_quantity'];
$matrix_theory_quantity = $_POST['matrix_theory_quantity'];
$payment = $_POST['payment'];

$book_publishers = [
    'web_technology' => 'Springer press',
    'mathematics' => 'ACM press',
    'os_principle' => 'Science press',
    'matrix_theory' => 'High education press'
];

$book_prices = [
    'web_technology' => 5.0,
    'mathematics' => 6.2,
    'os_principle' => 10,
    'matrix_theory' => 7.8
];

$total_cost = 0;
$total_books = 0;
$order_details = [];

foreach ($book_prices as $book => $price) {
    $quantity = $_POST["{$book}_quantity"];
    if ($quantity > 0) {
        $total_books += $quantity;
        $cost = $price * $quantity;
        $total_cost += $cost;
        $order_details[] = [
            'book' => $book,
            'publisher' => $book_publishers[$book],
            'price' => $price,
            'quantity' => $quantity,
            'cost' => $cost
        ];
    }
}

// 显示结果界面
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>Order Details</h1>";
echo "<h3>Customer Information</h3>";
echo "<p><strong>Customer name:</strong> {$name}</p>";
echo "<p><strong>Customer address:</strong> {$address}</p>";
echo "<p><strong>Customer zip:</strong> {$zip}</p>";
echo "<h3>Order Summary</h3>";
echo "<table>";
echo "<tr><th>Book</th><th>Publisher</th><th>Price</th><th>Quantity</th><th>Total Cost</th></tr>";
foreach ($order_details as $detail) {
    echo "<tr>";
    echo "<td>{$detail['book']}</td>";
    echo "<td>{$detail['book']}</td>";
    echo "<td>{$detail['price']}</td>";
    echo "<td>{$detail['quantity']}</td>";
    echo "<td>{$detail['cost']}</td>";
    echo "</tr>";
}
echo "</table>";
echo "<p><strong>{$name}</strong> has bought <strong>{$total_books}</strong> books.</p>";
echo "<p><strong>{$name}</strong> paid <strong>\${$total_cost}</strong>.</p>";
echo "<p>Paid by <strong>{$payment}</strong>.</p>";
echo "</div>";
echo "<a class=\"ref\" href=\"./main.html\">RETURN</a>";
echo "</body>";
echo "</html>";

// 将数据存到文件
$file = fopen("orders.txt", "a");
fwrite($file, "{$name} has bought {$total_books} books.\r\n");
fwrite($file, "{$name} paid \${$total_cost}.\r\n");
fwrite($file, "Paid by {$payment}.\r\n\r\n");
fclose($file);
?>
