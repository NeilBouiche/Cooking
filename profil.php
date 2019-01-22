<?php include 'index.php';
  if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit();
  }
  $sql = ("SELECT idMembre, login, nom, prenom FROM membres");
  $query = mysqli_query($conn, $sql);
  $res = mysqli_fetch_assoc($query);
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
  $login = $_SESSION['login'];
  $id = $_SESSION['idMembre'];
  $gravatar = $_SESSION['gravatar'];



 ?>
 <link rel="stylesheet" href="profil.css">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center img_profil">
        <?php echo '<img class="img_profil" src="gravatars/'.$_SESSION['gravatar'].'"/>'; ?>
      </div>
      <div class="col-12 col-12 d-flex justify-content-center img_profil" id="hello">
        <?php echo "<h2>Bonjour ".$_SESSION['prenom']."</h2>"; ?>
      </div>
    </div>
  <div class="row">
    <p class="col-12 d-flex justify-content-center">
      <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" style="background-color: #FFE2C3;border-color: #FFE2C3; color: grey; margin: 5% 0.5%;" aria-controls="multiCollapseExample1">Editer mes recettes</a>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" style="background-color: #FFE2C3;border-color: #FFE2C3; color: grey; margin: 5% 0.5%;" aria-expanded="false" aria-controls="multiCollapseExample2">Ajouter une recette</button>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" style="background-color: #FFE2C3;border-color: #FFE2C3; color: grey; margin: 5% 0.5%;" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Tout afficher</button>
    </p>
    <div class="row">
    <div class="col-5 offset-2">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
    <div class="card card-body">
    <?php

    $modal = $sql = "SELECT * FROM recettes WHERE idMembre ='".$id."'";
    $result = mysqli_query($conn, $modal);
    $queryResult = mysqli_num_rows($result);

    $recettes = "SELECT titre, chapo, img FROM recettes WHERE idMembre ='".$id."'";
    $liste = mysqli_query($conn, $recettes);
    $requeteResultat = mysqli_num_rows($liste);
    if ($requeteResultat > 0) {
      while ($row = mysqli_fetch_array($liste) AND $row2 = mysqli_fetch_assoc($result)) { ?>
      <div class="card" style="width: 18rem;">
        <?php echo '<img class="card-img-top" src="recettes/'.$row['img'].'"/>'; ?>
      <div class="card-body">
        <?php echo '<h5 class="card-title"> '.$row["titre"].' </h5>'; ?>
        <?php echo '<p class="card-text">'.$row["chapo"].' </p>'; ?>
        <a class="btn btn-primary" style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' data-toggle="modal" <?php echo "data-target= #a".$row2["idRecette"]." "; ?> >Voir la recette complète</a>
      <div class="modal fade bd-example-modal-lg" <?php echo "id=a".$row2['idRecette'].""; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <?php echo '<img class="card-img-top" src="recettes/'.$row2['img'].'"/>'; ?>
      </div>
      <div class="modal-body">
      <h4><?php echo $row2['titre']; ?></h4>
        <p><?php echo $row2['chapo']; ?></p>
        <h4>Détails</h4>
        <p><?php echo $row2['tempsCuisson']; ?></p>
        <p><?php echo $row2['tempsPreparation']; ?></p>
        <p><?php echo $row2['difficulte']; ?></p>
        <p><?php echo $row2['prix']; ?></p>
        <br>
        <h4>Ingrédients</h4>
        <p><?php echo $row2['ingredient']; ?></p>
        <br>
        <h4>Préparation</h4>
        <p><?php echo $row2['preparation']; ?></p>
        </div>
        <form method="post">
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Titre</label>
            <input class="form-control" name="titre" type="text" placeholder="Titre">
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Chapo</label>
            <textarea class="form-control" name="chapo" cols= "60" rows= "1" placeholder="Chapo"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Préparation</label>
            <textarea class="form-control" name="preparation" cols= "60" rows= "1" placeholder="Préparation"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Ingrédients</label>
            <textarea class="form-control" name="ingredient" cols= "60" rows= "1" placeholder="Ingrédients"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Temps de préparation</label>
            <select name="tempsPreparation"class="form-control">
              <option value="10min">10min</option>
              <option value="20min">20min</option>
              <option>30min</option>
              <option value="1H">1H</option>
              <option value="2H">2H</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Temps de cuisson</label>
            <select name="tempsCuisson"class="form-control">
              <option value="10min">10min</option>
              <option value="20min">20min</option>
              <option value="30min">30min</option>
              <option value="1H">1H</option>
              <option value="2H">2H</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Difficulté</label>
            <select name="difficulte"class="form-control">
              <option value="facile">Facile</option>
              <option value="moyen">Moyen</option>
              <option value="difficile">Difficile</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Prix</label>
            <select name="prix" class="form-control">
              <option value="pasCher">Pas cher</option>
              <option value="cher">Cher</option>
              <option value="tresCher">Très cher</option>
            </select>
          </div>
          <div class="custom-file form-group col-12">
            <input type="file" class="custom-file-input" name="gravatar" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Rechercher</label>
          </div>
          <input type="hidden" name="idRecette" value="<?php echo $id; ?>">
          <div class="form-group col-12">
            <button name="edit" type="submit" class="btn btn-warning">Editer</button>
            <button name="delete" type="submit" class="btn btn-danger">Supprimer</button>
          </div>
        </form>
        <?php
        $sql2= "SELECT * FROM recettes WHERE idMembre='$id'";
        $query2 = mysqli_query($conn, $sql2);
        $res2 = mysqli_fetch_assoc($query2);
          if (isset($_POST['edit'])) {

          $id2 = $_POST['idRecette'];
          $titre = $_POST['titre'];
          $chapo = $_POST['chapo'];
          $preparation = $_POST['preparation'];
          $ingredient = $_POST['ingredient'];
          $tempsCuisson = $_POST['tempsCuisson'];
          $tempsPreparation = $_POST['tempsPreparation'];
          $difficulte = $_POST['difficulte'];
          $prix = $_POST['prix'];
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $photo = $_FILES['recette_img'];
          $fileName = $_FILES['recette_img']['name'];
          $fileTmpName = $_FILES['recette_img']['tmp_name'];
          $fileSize = $_FILES['recette_img']['size'];
          $fileError = $_FILES['recette_img']['error'];
          $fileType = $_FILES['recette_img']['type'];
          $fileExt = explode('.', $fileName);
          $fileActualExt = strtolower(end($fileExt));
          $allowed = array('jpg', 'jpeg', 'png', 'pdf');
          if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
            if ($fileSize <1000000) {
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'recettes/'.$fileNameNew;
            if ($fileDestination == 1) {
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
            $sql3 = "UPDATE 'recettes'
            SET img ='$fileNameNew', titre ='$titre', chapo ='$chapo', preparation ='$preparation', ingredient ='$ingredient', tempsCuisson ='$tempsCuisson', tempsPreparation ='$tempsPreparation', difficulte ='$difficulte', prix ='$prix'
            WHERE idRecette ='$id2'";
            $query3 = mysqli_query($conn, $sql3);
            $res3 = mysqli_fetch_assoc($query3);
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php }
  }
  ?>
</div>
  </div>
</div>
  <div class="col" style="float:right;">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Titre</label>
            <input class="form-control" name="titre" type="text" placeholder="Titre">
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Chapo</label>
            <textarea class="form-control" name="chapo" cols= "60" rows= "1" placeholder="Chapo"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Préparation</label>
            <textarea class="form-control" name="preparation" cols= "60" rows= "1" placeholder="Préparation"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlInput1">Ingrédients</label>
            <textarea class="form-control" name="ingredient" cols= "60" rows= "1" placeholder="Ingrédients"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Temps de préparation</label>
            <select name="tempsPreparation"class="form-control">
              <option value="10min">10min</option>
              <option value="20min">20min</option>
              <option>30min</option>
              <option value="1H">1H</option>
              <option value="2H">2H</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Temps de cuisson</label>
            <select name="tempsCuisson"class="form-control">
              <option value="10min">10min</option>
              <option value="20min">20min</option>
              <option value="30min">30min</option>
              <option value="1H">1H</option>
              <option value="2H">2H</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Difficulté</label>
            <select name="difficulte"class="form-control">
              <option value="facile">Facile</option>
              <option value="moyen">Moyen</option>
              <option value="difficile">Difficile</option>
            </select>
          </div>
          <div class="form-group col-12">
            <label for="exampleFormControlSelect1">Prix</label>
            <select name="prix" class="form-control">
              <option value="pasCher">Pas cher</option>
              <option value="cher">Cher</option>
              <option value="tresCher">Très cher</option>
            </select>
          </div>
          <div class="custom-file form-group col-12">
            <input type="file" class="custom-file-input" name="recette" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Rechercher</label>
          </div>
          <input type="hidden" name="idRecette" value="<?php echo $id; ?>">
          <div class="form-group">
            <button name="enregistrer" type="submit" style="margin-top: 5%;" class="btn btn-warning button">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--</div>
</div>
</div>-->
<?php 
  $titre=$_POST['titre'];
  $chapo=$_POST['chapo'];
  $preparation=$_POST['preparation'];
  $ingredient=$_POST['ingredient'];
  $tempsPreparation=$_POST['tempsPreparation'];
  $tempsCuisson=$_POST['tempsCuisson'];
  $difficulte=$_POST['difficulte'];
  $prix=$_POST['prix'];
  $img_recette = $_FILES['recette'];
  $fileName = $_FILES['recette']['name'];
  $fileTmpName = $_FILES['recette']['tmp_name'];
  $fileSize = $_FILES['recette']['size'];
  $fileError = $_FILES['recette']['error'];
  $fileType = $_FILES['recette']['type'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize <1000000) {
         $fileNameNew = uniqid('', true).".".$fileActualExt;
         $fileDestination = 'recettes/'.$fileNameNew;
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
  } if (isset($enregistrer)) {
    $setR="INSERT INTO recettes (titre, chapo, preparation, ingredient, tempsPreparation, tempsCuisson, difficulte, prix) VALUES ('$titre', '$chapo', '$preparation', '$ingredient', '$tempsPreparation', '$tempsCuisson'; '$difficulte', '$prix')";
    $requete = mysqli_query($conn, $setR);
    if ($requete == true) {
      echo "<div style='text-align:center' class='alert alert-success' role='alert'>Recette enregistré</div><br>";
    }

  }
    
 ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
<?php include 'footer.php'; ?>
</html>
