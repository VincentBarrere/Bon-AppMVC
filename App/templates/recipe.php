<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bon'App</title>
    <link rel="icon" type="image/png" href="../img/Logo.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <header>
        <div class="container-fluid">
            <div id="head" class="row align-items-center">
                <div class="col-md-2 col-sm-12">
                    <img src="../img/Logo.svg" alt="">
                </div>
                <div class="col-md-10 text-center">
                    <h1 class="d-none d-md-block">Une manière simple de bien manger</h1>
                </div>
            </div>
        </div>
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active me-md-5" aria-current="page" href="index.php">Accueil</a>
                        <a class="nav-link me-md-5 ms-md-5" href="?route=choice">Selection</a>
                        <li class="nav-item dropdown me-md-5 ms-md-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Recettes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Entrées</a></li>
                                <li><a class="dropdown-item" href="#">Plats</a></li>
                                <li><a class="dropdown-item" href="#">Desserts</a></li>
                                <li><a class="dropdown-item" href="#">Autres</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-md-5 ms-md-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Contact
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">A propos de nous</a></li>
                                <li><a class="dropdown-item" href="#">Nous contacter</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
                <?php
                if (!empty($_SESSION)) {
                ?>
                    <a href="" class="btn btn-outline-primary me-2"><?php echo $_SESSION['username']; ?></a>
                    <a href="?logout" class="btn btn-outline-primary me-2">Disconnect</a>
                <?php
                } else {
                ?>
                    <a href="signin.php" class="btn btn-primary me-2">Connexion</a>
                    <a href="signup.php" type="button" class="btn btn-primary">Inscription</a>
                <?php
                }
                ?>
            </div>
        </nav>
    </header>
    <section id="section-1">
        <div class="container">
            <div class="row">

                <?php
                echo $recipes;
                ?>

            </div>
        </div>
    </section>
    <footer>

    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>

</html>