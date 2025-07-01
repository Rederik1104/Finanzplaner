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
          login();
        }
      });
      if (!valid) e.preventDefault();
    });

function login(){
    const form = document.querySelector('form');
    const username = form.username.value;
    const password = form.password.value;
    
    if (username === 'admin' && password === 'password') {
        alert('Login successful!');
        // Redirect or perform further actions
    } else {
        alert('Invalid username or password');
    }
}