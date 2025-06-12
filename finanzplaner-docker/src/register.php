<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Registrierung</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2 class="login-title">Registrieren</h2>
            <form action="register_process.php" method="post">
                <input type="text" name="username" placeholder="Benutzername" required>
                <span class="error-message"></span>

                <input type="email" name="email" placeholder="E-Mail" required>
                <span class="error-message"></span>

                <input type="password" name="password" placeholder="Passwort" required>
                <span class="error-message"></span>

                <input type="password" name="confirm_password" placeholder="Passwort bestätigen" required>
                <span class="error-message"></span>

                <button type="submit" class="btn-submit">Registrieren</button>
            </form>
            <div class="forgot-password" style="text-align:center; margin-top:1rem;">
                <a href="login.php">Zurück zum Login</a>
            </div>
        </div>
    </div>
  
</body>
</html>
