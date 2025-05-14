<?php
include 'connection.php';
include 'logger.php'; 

$category_id = $_GET['category_id'] ?? '';
log_request('get_by_category', ['category_id' => $category_id]); 

$stmt = $pdo->prepare("SELECT * FROM items WHERE FID_Category = ?");
$stmt->execute([$category_id]);
$items = $stmt->fetchAll();

foreach ($items as $item) {
    echo "<p>{$item['name']} - {$item['price']}$</p>";
}
?>
