<?php
require __DIR__ . '/database.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="login-wrapper">
        <div class="login-box">
            <h2 class="login-title">Login</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Benutzername" required>
                <span class="error-message"></span>

                <input type="password" name="password" placeholder="Passwort" required>
                <span class="error-message"></span>

                <button type="submit" class="btn-submit">Login</button>
            </form>
            <div class="forgot-password" style="text-align:center; margin-top:1rem;">
                <p><a href="index.php">Zurück zur Startseite</a></p>
                <p>Kein Konto? <a href="register.php">Registrieren</a></p>
                <p><a href="password_forgot">Passwort vergessen</a></p>
            </div>
        </div>
    </div>
  <script src="login.js"></script>
</body>
</html>
