<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1001 Recept | Bejelentkezés</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="wrapper">
        <form action="loginValidation.php" method="post">
            <h1>Bejelentkezés</h1>
            <div class="input-box">
                <input type="text" placeholder="Felhasználónév" name="username_field" required>
                <i class='bx bxs-user-circle'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Jelszó" name="password_field" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button type="submit" class="btn">Belépés</button>
            <div class="register-link">
                <p>Nincs még profilod? <a href="register.php">Regisztrálj!</a></p>
                <p><a href="../view/mainpage.php">Vissza a főoldalra</a></p>
            </div> <!-- újra kell tölteni ha újra rákattintunk, hogy ne írja ki a rossz felhasználó/jelszót állandóan -->
            <?php
            session_start();
            if (isset($_SESSION['error'])): ?>
                <div style="color: red;">
                    <?php echo $_SESSION['error'];
                    ?>
                </div>
            <?php endif; ?> 
        </form>
    </div>

</body>

</html>
