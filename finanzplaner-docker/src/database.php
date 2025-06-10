<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Create a new Dotenv instance
$dotenv = Dotenv::createUnsafeImmutable(__DIR__);

// Load the environment variables
$dotenv->load();
$db_config['host'] = getenv('DB_HOST');
$db_config['user'] = getenv('DB_USER');
$db_config['password'] = getenv('DB_PASS');
$db_config['database'] = getenv('DB_DATABASE');
$db_config['charset'] = 'utf8mb4';
$db_config['port'] = getenv('DB_PORT');

try {
    // Create a new PDO instance
    $pdo = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['database']};charset={$db_config['charset']};port={$db_config['port']}",
        $db_config['user'],
        $db_config['password']
    );

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    die("Database connection failed: " . $e->getMessage());
}

// Check if the 'users' table exists
$tableName = 'users';
$query = $pdo->prepare("SHOW TABLES LIKE :tableName");
$query->bindParam(':tableName', $tableName);
$query->execute();
if ($query->rowCount() === 0) {
    // Table does not exist, so create it
    $createTableQuery = "
        CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($createTableQuery);
}
?>