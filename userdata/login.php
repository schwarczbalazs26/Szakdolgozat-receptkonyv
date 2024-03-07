<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="wrapper">
    <form action="">
        <h1>Bejelentkezés</h1>
        <div class="input-box">
            <input type="text" placeholder="Felhasználónév" required>
            <i class='bx bxs-user-circle'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Jelszó" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <button type="submit" class="btn">Belépés</button>
        <div class="register-link">
            <p>Nincs még profilod? <a href="register.php">Regisztrálj!</a></p>
        </div>
    </form>
</div>
    
</body>



</html>