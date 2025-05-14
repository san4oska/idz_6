<?php
include 'connection.php';
include 'logger.php'; 

$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';
log_request('get_by_price', ['min_price' => $min_price, 'max_price' => $max_price]); 

$stmt = $pdo->prepare("SELECT * FROM items WHERE price BETWEEN ? AND ?");
$stmt->execute([$min_price, $max_price]);
$items = $stmt->fetchAll();

foreach ($items as $item) {
    echo "<p>{$item['name']} - {$item['price']}$</p>";
}
?>
