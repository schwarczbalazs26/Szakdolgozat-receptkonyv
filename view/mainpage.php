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
</head>

<body>

    <div>
        <header>
            <div class="container">
                <h1 class="logo"></h1>
                <nav>
                    <ul>
                        <!--     <li><img src="" alt="Logó"></li> -->
                        <li><a href="#">Kezdőlap</a></li>
                        <li><a href="#">Receptek</a></li>
                        <li><a href="#">Rólunk</a></li>
                        <li><a href="../userdata/register.php" id="loginButton">Bejelentkezés</a></li>
                        <!-- Modal popup implementálása -->
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <!-- Belépő modal -->
    <div id="loginModal" class="modal">
        <!-- Modal tartalma -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form id="loginForm">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <div class="container">

        <div class="row height d-flex justify-content-center align-items-center">

            <div class="col-md-8">

                <div class="search">
                    <i class="fa fa-search"></i>
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

</body>

</html>
