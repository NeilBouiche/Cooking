<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="back.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="retour col-4 col-sm-4">
          <a href="Accueil.php"><i id="arrow" class="fas fa-arrow-left fa-2x"></i></a>
        </div>
      </div>
      <div class="row">
        <h1 id="head">Connexion</h1>
      </div>
    <div class="row">
      <form method="post" class="form-inlin justify-content-center offset-3 col-6">
        <?php
          if (isset($_POST['login-submit'])) {
            require 'connexion.php';

            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            if (empty($pseudo) || empty($mdp)) {
              echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Veuillez renseigner tout les champs pour vous connecter</div><br>";
            } else {
              $sql = "SELECT * FROM membres WHERE login=?;";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Votre pseudo semble erroné</div><br>";
              } else {
                mysqli_stmt_bind_param($stmt, "s", $pseudo);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                  $mdpCheck = password_verify($mdp, $row['password']);
                  if ($mdpCheck == false) {
                    echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Votre mot de passe semble erroné</div><br>";
                  } elseif ($mdpCheck == true) {
                    session_start();
                    $_SESSION['login'] = $row['login'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['idMembre'] = $row['idMembre'];
                    $_SESSION['gravatar'] = $row['gravatar'];
                    header("Location: /Cooking/Accueil.php");
                  }
                } else {
                  echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Votre pseudo ou mot de passe semble erroné</div><br>";
                }
              }
            }
          }

         ?>
          <div class="form-group">
            <label class="sr-only">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
          </div>
          <br>
        <div class="form-group">
          <label class="sr-only">Mot de passe</label>
          <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
        </div>
        <br><br><br>
      <button type="submit" name="login-submit" class="btn offset-5 button">Se connecter</button>
      </div>
    </div>
<?php
  include 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
