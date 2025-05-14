<?php
$log_pdo = new PDO("sqlite:log.sqlite");

$stmt = $log_pdo->query("SELECT * FROM logs ORDER BY request_time DESC");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Журнал запитів</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Журнал запитів</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Тип запиту</th>
            <th>Параметри</th>
            <th>Час запиту</th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= htmlspecialchars($log['id']) ?></td>
                <td><?= htmlspecialchars($log['request_type']) ?></td>
                <td>
                    <?php
                    $params = json_decode($log['parameters'], true);
                    foreach ($params as $key => $value) {
                        echo "<strong>" . htmlspecialchars($key) . "</strong>: " . htmlspecialchars($value) . "<br>";
                    }
                    ?>
                </td>
                <td><?= htmlspecialchars($log['request_time']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
