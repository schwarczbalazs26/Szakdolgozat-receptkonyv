<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1001 Recept | Regisztrálj profilt!</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Regisztráció</h1>
            <div class="input-box">
                <input type="text" placeholder="Felhasználónév" name="username_field"
                    value="<?php echo isset($_POST['username_field']) ? htmlspecialchars($_POST['username_field']) : ''; ?>"
                    required>
                <i class='bx bxs-user-circle'></i>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Email" name="email_field"
                    value="<?php echo isset($_POST['email_field']) ? htmlspecialchars($_POST['email_field']) : ''; ?>"
                    required>
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Jelszó" name="password_field" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button type="submit" class="btn">Regisztrálj!</button>
            <div class="register-link">
                <p><a href="login.php">Vissza</a></p>
            </div>
        </form>

        <?php
        require_once "registerValidation.php";

        if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <p>
                        <?php echo $error; ?>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>