function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var icon = document.querySelector("#togglePassword i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

function switchToLogin() {
    document.getElementById('loginTab').classList.add('active');
    document.getElementById('registerTab').classList.remove('active');
    document.getElementById('loginModalLabel').textContent = 'Bejelentkezés';
    document.getElementById('emailField').style.display = 'none';
    document.getElementById('confirmPasswordField').style.display = 'none';
    document.getElementById('username').value = '';
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    document.getElementById('confirmPassword').value = '';
}

function switchToRegister() {
    document.getElementById('registerTab').classList.add('active');
    document.getElementById('loginTab').classList.remove('active');
    document.getElementById('loginModalLabel').textContent = 'Regisztráció';
    document.getElementById('emailField').style.display = 'block';
    document.getElementById('confirmPasswordField').style.display = 'block';
    document.getElementById('username').value = '';
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    document.getElementById('confirmPassword').value = '';
}