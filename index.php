<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Фільтр товарів</title>
</head>
<body>
    <h1>Фільтр товарів</h1>
    <form action="get_by_vendor.php" method="GET">
        <label>Оберіть виробника:</label>
        <select name="vendor_id">
            <?php
            $vendors = $pdo->query("SELECT ID_Vendors, v_name FROM vendors")->fetchAll();
            foreach ($vendors as $vendor) {
                echo "<option value='{$vendor['ID_Vendors']}'>{$vendor['v_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Показати</button>
    </form>

    <form action="get_by_category.php" method="GET">
        <label>Оберіть категорію:</label>
        <select name="category_id">
            <?php
            $categories = $pdo->query("SELECT ID_Category, c_name FROM category")->fetchAll();
            foreach ($categories as $category) {
                echo "<option value='{$category['ID_Category']}'>{$category['c_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Показати</button>
    </form>

    <form action="get_by_price.php" method="GET">
        <label>Мінімальна ціна:</label>
        <input type="number" name="min_price">
        <label>Максимальна ціна:</label>
        <input type="number" name="max_price">
        <button type="submit">Показати</button>
    </form>
</body>
</html>
