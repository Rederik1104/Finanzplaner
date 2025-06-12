<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <main class="login-wrapper">
    <section class="login-box" role="main" aria-labelledby="loginTitle">
      <h1 id="loginTitle" class="login-title">Login</h1>
      <form action="#" method="POST" autocomplete="off" novalidate>
        <div class="form-group">
          <label for="username">Benutzername</label>
          <input type="text" id="username" name="username" placeholder="Benutzername eingeben" required minlength="3" autocomplete="username" />
          <small class="error-message" aria-live="polite"></small>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="eamil" name="email" placeholder="Email-Adresse eingeben" required minlength="3" autocomplete="email" />
          <small class="error-message" aria-live="polite"></small>
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input type="password" id="password" name="password" placeholder="Passwort eingeben" required minlength="6" autocomplete="current-password" />
          <small class="error-message" aria-live="polite"></small>
        </div>
        <button type="submit" class="btn-submit">Einloggen</button>
      </form>
      <p class="forgot-password"><a href="#" tabindex="0">Passwort vergessen?</a></p>
      <p class="register"><a href="register.php">Registrieren</a></p>
        <div class="forgot-password" style="text-align:center; margin-top:1rem;">
            <a href="index.php">Zurück zur Startseite</a>
        </div>
    </section>
  </main>

  <script>
    // Minimal JS Validation (optional)
    document.querySelector('form').addEventListener('submit', e => {
      let valid = true;
      const inputs = e.target.querySelectorAll('input[required]');
      inputs.forEach(input => {
        const errorMsg = input.nextElementSibling;
        if (!input.checkValidity()) {
          errorMsg.textContent = input.validationMessage;
          valid = false;
        } else {
          errorMsg.textContent = '';
        }
      });
      if (!valid) e.preventDefault();
    });
  </script>
</body>
</html>
