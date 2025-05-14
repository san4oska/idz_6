<?php
$log_pdo = new PDO("sqlite:log.sqlite");

$log_pdo->exec("CREATE TABLE IF NOT EXISTS logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    request_type TEXT,
    parameters TEXT,
    request_time TEXT
)");

function log_request($request_type, $parameters) {
    global $log_pdo;
    $stmt = $log_pdo->prepare("INSERT INTO logs (request_type, parameters, request_time) VALUES (?, ?, ?)");
    $stmt->execute([
        $request_type,
        json_encode($parameters, JSON_UNESCAPED_UNICODE),
        date('Y-m-d H:i:s')
    ]);
}
?>
