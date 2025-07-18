<?php

require __DIR__ . '/database.php';

// Setze den Content-Type auf JSON
header('Content-Type: application/json');

// Hole die Daten aus dem POST-Request (z.B. von register.js per fetch)
$data = json_decode(file_get_contents('php://input'), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';
$email = $data['email'] ?? '';

// Validierung (einfaches Beispiel)
if (!$username || !$password || !$email) {
    echo json_encode(['success' => false, 'message' => 'Bitte alle Felder ausfüllen.']);
    exit;
}

// Passwort hashen
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//var_dump("hashedPassword"); // Debugging-Zweck, kann entfernt werden
try {
    // Prüfe, ob der Benutzername schon existiert
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Benutzername existiert bereits.']);
        exit;
    }

    // Benutzer eintragen
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute([
        'username' => $username,
        'password' => $hashedPassword,
        'email' => $email
    ]);

    echo json_encode(['success' => true, 'message' => 'Registrierung erfolgreich!']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Fehler: ' . $e->getMessage()]);
}