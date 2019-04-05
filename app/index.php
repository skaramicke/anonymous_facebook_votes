<?php

$host = getenv('MYSQL_SERVER');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$db = getenv('MYSQL_DATABASE');
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo '<h1>Database Connection Error</h1>';
    echo "<p><strong>Code:</strong> {$e->getCode()}</p>";
    echo "<p><strong>Message:</strong> {$e->getMessage()}</p>";
}