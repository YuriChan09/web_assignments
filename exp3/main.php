<?php
$name = $_POST['name'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$web_technology_quantity = $_POST['web_technology_quantity'];
$mathematics_quantity = $_POST['mathematics_quantity'];
$os_principle_quantity = $_POST['os_principle_quantity'];
$matrix_theory_quantity = $_POST['matrix_theory_quantity'];
$payment = $_POST['payment'];

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
            'price' => $price,
            'quantity' => $quantity,
            'cost' => $cost
        ];
    }
}

// Display the results
echo "Customer name: {$name}<br>";
echo "Customer address: {$address}<br>";
echo "Customer zip: {$zip}<br>";

echo "<table border='1'>";
echo "<tr><th>book</th><th>publisher</th><th>price</th><th>total cost</th></tr>";
foreach ($order_details as $detail) {
    echo "<tr>";
    echo "<td>{$detail['book']}</td>";
    echo "<td>{$detail['price']}</td>";
    echo "<td>{$detail['quantity']}</td>";
    echo "<td>{$detail['cost']}</td>";
    echo "</tr>";
}
echo "</table>";

echo "{$name} has bought {$total_books} books.<br>";
echo "{$name} paid \${$total_cost}.<br>";
echo "Paid by {$payment}.<br>";

// Save the data to a file
$file = fopen("orders.txt", "a");
fwrite($file, "{$name} has bought {$total_books} books.\r\n");
fwrite($file, "{$name} paid \${$total_cost}.\r\n");
fwrite($file, "Paid by {$payment}.\r\n\r\n");
fclose($file);


// Connect database
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_order_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//获取表单数据
$name = $_POST["name"];
$address = $_POST["address"];
$zip = $_POST["zip"];
$book = $_POST["book"];
$publisher = $_POST["publisher"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$payment = $_POST["payment"];

//将数据插入到相应的表中
$sql1 = "INSERT INTO customers (name, address, zip) VALUES ('$name', '$address', '$zip')";
$conn->query($sql1);

$sql2 = "INSERT INTO books (book, publisher, price) VALUES ('$book', '$publisher', '$price')";
$conn->query($sql2);

$sql3 = "INSERT INTO orders (name, book, quantity) VALUES ('$name', '$book', '$quantity')";
$conn->query($sql3);

//关闭数据库连接
$conn->close();

?>