<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőlap</title>
    <link rel="stylesheet" href="searchStyle.css">
    <link rel="stylesheet" href="mainpageStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div>
        <header>
            <div class="container">
                <h1 class="logo"></h1>
                <nav>
                    <ul>
                        <!--     <li><img src="" alt="Logó"></li> -->
                        <li class="nav-item"><a class="nav-link" href="index.php">Kezdőlap</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Receptek</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rólunk</a></li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-link nav-link float-right btn-nav-login"
                                data-toggle="modal" data-target="#loginModal" id="navLoginButton">Bejelentkezés</button>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


    <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="loginRegisterTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="loginTab" href="#" onclick="switchToLogin()">
                                <i class="fas fa-sign-in-alt"></i> Bejelentkezés
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="registerTab" href="#" onclick="switchToRegister()">
                                <i class="fas fa-user-plus"></i> Regisztráció
                            </a>
                        </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Felhasználónév:</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div id="emailField" style="display: none;">
                        <div class="form-group">
                            <label for="email">Email cím:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Jelszó:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePasswordVisibility()">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="confirmPasswordField" style="display: none;">
                        <div class="form-group">
                            <label for="confirmPassword">Jelszó mégegyszer:</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-primary" id="loginButton">Bejelentkezés</button>
                </div>
            </div>
        </div>
    </div>       

    <div class="container">

        <div class="row height d-flex justify-content-center align-items-center">

            <div class="col-md-8">

                <div class="search">
                    <input type="text" class="form-control" placeholder="Keress receptekre!">
                    <button class="btn btn-primary">Keresés</button>
                </div>

            </div>

        </div>
    </div>


    <div class="container text-center my-3">
        <h2 class="font-weight-light">lorem ipsum</h2>
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-bs-ride="carousel" data-bs-interval="10000"
                data-bs-slide="3">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/pizza.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/macron.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/croissant.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/pancake.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/pasta.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <img class="img-fluid" src="../images/buns.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Előző</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Következő</span>
                </a>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="carousel.js"></script>
    <script src="login.js"></script>


</body>

</html>