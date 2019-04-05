<?php

// This is useful in queries later
define('DB_NAME', getenv('MYSQL_DATABASE'));

$dsn = 'mysql:host='.getenv('MYSQL_SERVER').';'.
       'dbname='.DB_NAME.';'.
       'charset=utf8mb4';

try {
    $pdo = new PDO(
        $dsn,
        getenv('MYSQL_USER'),
        getenv('MYSQL_PASSWORD'),
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (\PDOException $e) {
    echo '<h1>Database Connection Error</h1>';
    echo "<p><strong>Code:</strong> {$e->getCode()}</p>";
    echo "<p><strong>Message:</strong> {$e->getMessage()}</p>";
    exit;
}