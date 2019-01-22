<?php
$serveur = "localhost";
$username = "root";
$password = "root";
$dbname = "Cooking";

$conn = mysqli_connect($serveur, $username, $password, $dbname);

if (!$conn) {
  die("Echec de la connexion".mysqli_connect_error());
}
?>
