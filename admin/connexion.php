<?php
$serveur = "localhost";
$username = "root";
$password = "root";
$dbname = "Cooking";
$mysqli = new mysqli($serveur, $username, $password, $dbname) or die(mysqli_error($mysqli));

$update = false;
$nom = '';
$prenom = '';
$login = '';
$id = 0;


$mysqli->query("SELECT idMembre, gravatar, login, prenom, nom, dateCrea FROM membres") or die($mysqli->error);

$query = ("SELECT idMembre, gravatar, login, prenom, nom, dateCrea FROM membres");
$res = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($res);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM membres WHERE idMembre=$id") or die($mysqli->error);

  $_SESSION['message'] = "Utilisateur supprimé";
  $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT idMembre, login, prenom, nom FROM membres") or die($mysqli->error);
}
if (isset($_POST['update'])) {
  $id = $_POST['idMembre'];
  $login = $_POST['pseudo'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];

  $mysqli->query("UPDATE membres SET login='$login', nom='$nom', prenom='$prenom' WHERE idMembre=$id") or die($mysqli->error);

  $_SESSION['message'] = "Les données de l'utilisateur ont été mis à jour";
  $_SESSION['msg_type']= "success";
}

//RECETTES


$mysqli->query("SELECT * FROM recettes") or die($mysqli->error);
$update2 = false;
$titre = '';
$chapo = '';
$preparation = '';
$ingredient = '';
$tempsCuisson = '';
$tempsPreparation = '';
$difficulte = '';
$prix = '';
$id2 = 0;

$query2 = ("SELECT * FROM recettes");
$res2 = mysqli_query($mysqli, $query2);
$row2 = mysqli_num_rows($res2);

if (isset($_GET['delete'])) {
  $id2 = $_GET['delete'];
  $mysqli->query("DELETE FROM membres WHERE idMembre=$id2") or die($mysqli->error);

  $_SESSION['message'] = "Recette supprimé";
  $_SESSION['msg_type'] = "danger";
}

if (isset($_GET['edit'])) {
  $id2 = $_GET['edit'];
  $update2 = true;
  $result2 = $mysqli->query("SELECT titre, chapo, preparation, ingredient, tempsCuisson, tempsPreparation, difficulte, prix FROM recettes") or die($mysqli->error);
}
if (isset($_POST['update2'])) {
  $id = $_POST['idRecette'];
  $titre = $_POST['titre'];
  $chapo = $_POST['chapo'];
  $preparation = $_POST['preparation'];
  $ingredient = $_POST['ingredient'];
  $tempsCuisson = $_POST['tempsCuisson'];
  $tempsPreparation = $_POST['tempsPreparation'];
  $difficulte = $_POST['difficulte'];
  $prix = $_POST['prix'];


  $mysqli->query("UPDATE recettes SET titre='$titre', chapo='$chapo', preparation='$preparation', ingredient='$ingredient', tempsCuisson='$tempsCuisson', tempsPreparation='$tempsPreparation', difficulte='$difficulte', prix='$prix'  WHERE idRecette=$id2") or die($mysqli->error);

  $_SESSION['message'] = "Les données de la recettes ont été mis à jours";
  $_SESSION['msg_type']= "success";
}
?>
