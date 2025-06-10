<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/database.php';

// Example logic to handle a request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch users from the database
    echo "Verbunden mit DB: " . htmlspecialchars($db_config['database']) . "<br>";
    
    $query = $pdo->query("SELECT * FROM users");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "Anzahl Benutzer: " . count($users) . "<br>";

    // Display users
    foreach ($users as $user) {
        echo "Username: " . htmlspecialchars($user['username']) . "<br>";
        echo "Email: " . htmlspecialchars($user['created_at']) . "<br><br>";
    }
} else {
    echo "Unsupported request method.";
}
?>