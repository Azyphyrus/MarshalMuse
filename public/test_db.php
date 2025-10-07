<?php
require_once '../app/config/config.php';

try {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "✅ Connected to database successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
