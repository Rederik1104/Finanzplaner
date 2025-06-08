<?php
    require __DIR__ . '/vendor/autoload.php';

    use Dotenv\Dotenv;

    // Create a new Dotenv instance
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);

    // Load the environment variables
    $dotenv->load();
    $db_config['host'] = '192.168.178.170:3307';
    $db_config['user'] = 'u16_2TJ72rXuGB';
    $db_config['password'] = getenv('DB_PASSWORD'); // Use an environment variable for security
    $db_config['database'] = 's16_penguin109';
    $db_config['charset'] = 'utf8mb4';

    try {
        // Create a new PDO instance
        $pdo = new PDO(
            "mysql:host={$db_config['host']};dbname={$db_config['database']};charset={$db_config['charset']}",
            $db_config['user'],
            $db_config['password']
        );

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle connection errors
        die("Database connection failed: " . $e->getMessage());
    }

    //überprüfen, ob Tabelle existiert
    $tableName = 'users';
    $query = $pdo->prepare("SHOW TABLES LIKE :tableName");
    $query->bindParam(':tableName', $tableName);
    $query->execute();
    if ($query->rowCount() === 0) {
        // Tabelle existiert nicht, also erstellen
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