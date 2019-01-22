<?php session_start();
if (!isset($_SESSION['login'])) {
    header("location: login.php");
    exit();
    }
    include 'connexion.php';
    $sql = ("SELECT idMembre, login, nom, prenom FROM membres");
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($query);
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $login = $_SESSION['login'];
    $id = $_SESSION['idMembre'];
    $gravatar = $_SESSION['gravatar'];  
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="back.css">
    <title>Edit Profil</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="retour col-4 col-sm-4">
          <a href="Accueil.php"><i id="arrow" class="fas fa-arrow-left fa-2x"></i></a>
        </div>
      </div>
      <div class="row">
        <h1 id="head">Modifier</h1>
      </div>
      <div class="row">
        <form method="post" enctype="multipart/form-data" class="form-inlin justify-content-center offset-3 col-6">
          <?php
      // Vérification du formulaire de modif ------------------------------------------------

          if (isset($_POST['signup-submit'])) {

            require 'connexion.php';

            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            $cmdp = $_POST['cmdp'];
            $statut = 'membre';
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (empty($prenom) || empty($nom) || empty($pseudo) || empty($mdp) || empty($cmdp)) {
                echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Veuillez renseigner tout les champs</div><br>";

            } elseif ($mdp !== $cmdp) {
              echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Les mots de passes sont différents</div><br>";

            } else {
              $sql = "SELECT login FROM membres WHERE login = ?"; // "?" Pour ne pas directement utiliser $pseudo qui pourrait donner des infos
              $stmt = mysqli_stmt_init($conn); //Je vais préférer une requête préparée
              mysqli_stmt_prepare($stmt, $sql);
              mysqli_stmt_bind_param($stmt, "s", $pseudo);//"s" pour dire que je cherche 1 string
              mysqli_stmt_execute($stmt);//j'execute ma requête préparée
              mysqli_stmt_store_result($stmt);
              $resultChek = mysqli_stmt_num_rows($stmt);
              if ($resultChek > 0) {
                echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Ce Pseudo est déjà utilisé</div><br>";
             } else {
                $hashedmdp = password_hash($mdp, PASSWORD_DEFAULT);
                $gravatar = $_FILES['gravatar'];
                $fileName = $_FILES['gravatar']['name'];
                $fileTmpName = $_FILES['gravatar']['tmp_name'];
                $fileSize = $_FILES['gravatar']['size'];
                $fileError = $_FILES['gravatar']['error'];
                $fileType = $_FILES['gravatar']['type'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                    if ($fileSize <1000000) {
                       $fileNameNew = uniqid('', true).".".$fileActualExt;
                       $fileDestination = 'gravatars/'.$fileNameNew;
                       if ($fileDestination == 0) {
                         echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Veuillez choisir une photo de profil</div><br>";
                       }
                       move_uploaded_file($fileTmpName, $fileDestination);
                    } else {
                      echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Le fichier est trop lourd pour être téléchargé</div><br>";
                    }
                  } else {
                    echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Erreur de téléchargement de l'image, veuillez réessayer</div><br>";
                  }
                } else {
                    echo "<div style='text-align:center' class='alert alert-danger' role='alert'>Ce type de fichier n'est pas autorisé</div><br>";
                }
                $sql2 = "UPDATE `membres` SET `prenom` = '$prenom', `nom` = '$nom', `login` = '$pseudo', `gravatar` = '$fileNameNew', `mdp` = '$mdp' WHERE `membres`.`idMembre` = $id;";
                $query = mysqli_query($conn, $sql2);
                if ($query == true) {
                  echo "<div style='text-align:center' class='alert alert-success' role='alert'>Votre compte à été modifié</div><br>";
                  header("Location: /Cooking/login.php");
                }
              }
            }
          }
          ?>
            <form method="post" enctype="multipart/form-data" class="form-inlin justify-content-center offset-3 col-6">
            <div class="form-group">
              <label class="sr-only">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom">
            </div>
            <br>
          <div class="form-group">
            <label class="sr-only">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only">Confirmez votre mot de passe</label>
            <input type="password" name="cmdp" class="form-control" placeholder="Confirmez votre mot de passe">
          </div>
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gravatar" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            <br><br><br>
          <button type="submit" name="signup-submit" class="btn offset-5 button">Modfier</button>
        </form>
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
