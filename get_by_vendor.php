<?php
include 'connection.php';
include 'logger.php'; 

$vendor_id = $_GET['vendor_id'] ?? '';
log_request('get_by_vendor', ['vendor_id' => $vendor_id]); 

$stmt = $pdo->prepare("SELECT * FROM items WHERE FID_Vendor = ?");
$stmt->execute([$vendor_id]);
$items = $stmt->fetchAll();

foreach ($items as $item) {
    echo "<p>{$item['name']} - {$item['price']}$</p>";
}
?>
