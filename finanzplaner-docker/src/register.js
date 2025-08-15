async function register(event) {
  if (event) event.preventDefault();

  // Hole die Werte direkt aus den Input-Feldern
  const username = document.querySelector('input[name="username"]').value;
  const password = document.querySelector('input[name="password"]').value;
  const email = document.querySelector('input[name="email"]').value;

  const data = { username, password, email };

  try {
    const response = await fetch("verification.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });
    const result = await response.json();
    if (result.success) {
      try {
        const response = await fetch("register_process.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        });
        const result = await response.json();

        if (result.success) {
          alert(result.message);
          //window.location.href = "login.php";
        } else {
          document.querySelector(".error-message").textContent = result.message;
        }
      } catch (error) {
        console.error("Error:", error);
      }
    }
  } catch (error) {
    console.error("Error:", error);
    document.querySelector(".error-message").textContent =
      "Ein Fehler ist aufgetreten. Bitte versuche es später erneut.";
  }
}
