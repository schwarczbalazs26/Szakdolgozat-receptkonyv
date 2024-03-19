<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1001 Recept | Rólunk</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <style>

  </style>
</head>
<body>

<div>
    <header>
        <div class="container">
            <nav>
                <ul class="navbar">
                    <li class="nav-item"><a class="nav-link" href="../view/mainpage.php">Kezdőlap</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Receptek</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link nav-link float-right btn-nav-login"
                            data-toggle="modal" data-target="#loginModal" id="navLoginButton" onclick="window.location.href = '../userdata/login.php';">Bejelentkezés</button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-6">
      <h2>Rólunk</h2>
      <p>
        Üdvözöljük a 1001 Recept weboldalon! A 1001 Recept 2005-ben indult, hogy a legfinomabb recepteket és tippeket megosszuk a felhasználókkal világszerte.
      </p>
      <p>
        A mi célunk az, hogy inspiráljuk az embereket, hogy kreatívak legyenek a konyhában, és hogy mindenki élvezze a főzés élményét. Reméljük, hogy segítségünkkel sok új étel és íz világát fedezi fel!
      </p>
    </div>
    <div class="col-lg-6">
      <img src="https://via.placeholder.com/400" class="img-fluid" alt="1001 Recept csapata">
    </div>
  </div>
</div>

<footer class="bg-dark text-light mt-5">
  <div class="container py-3">
    <div class="row">
      <div class="col-lg-6">
        <p>&copy; 2024 1001 Recept</p>
      </div>
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>   
</body>
</html>
