<?php session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" media="screen" href="recettes.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="membre.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Accueil.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="search.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="footer.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="profil.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <img src="Group 2.png" alt="logo" class="logo col-6 col-sm-4 col-md-4 col-lg-2 img-responsive">
            <ul class="nav col-4 col-sm-7 col-md-7 col-lg-9 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="Accueil.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recettes.php">Recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dessert</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Minceur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Atelier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="membre.php">Membre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <?php
                    if (isset($_SESSION['login'])) {
                      echo "<li class='nav-item'>
                                <a class='nav-link compte' name='logout-submit' href='logout.php'>Déconnexion</a>
                            </li>";
                        echo "<li class='nav-item'>
                                <a class='nav-link compte' name='editProfil' href='editProfil.php'>Modifier son profil</a>
                             </li>";
                    } else {
                      echo "<li class='nav-item' >
                              <a class='nav-link compte' href='login.php'>Connexion</a>
                            </li>
                            <li class='nav-item'>
                              <a class='nav-link compte' href='signup.php'>Inscription</a>
                            </li>";
                    } ?>
            </ul>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                <i class="fab fa-facebook fa-2x rsoc"></i><i class="fab fa-twitter-square fa-2x rsoc"></i><i class="fab fa-youtube fa-2x rsoc"></i><i class="fab fa-google-plus-g fa-2x rsoc"></i>
            </div>
    <form method="POST" action="search.php" class="form-inline">
        <div class="form-inline" style="margin-top:10%;">
            <div class="form-group">
                <input type="search" name="q" placeholder="Recherche..." aria-label="Search" class="form-control" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="submit-search" role="submit" style="margin-left:5%; background-color: #FFE2C3;border-color: grey; color: grey;" type="submit">Rechercher</button>
            </div>
        </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
