<?php
    include 'index.php';
    include 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="search.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="footer.css" />
</head>
<body>
    <div class="container">
        <h1>Résulats</h1>
        <div class="row">
            <div class="card col-md-12 col-lg-12" style="width: 26rem; margin-top:10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);
                    if (isset($_POST['submit-search']) AND !empty($_POST['q'])) {
                        $search = mysqli_real_escape_string($conn, $_POST['q']);
                        $sql = "SELECT * FROM recettes WHERE titre LIKE '%$search%'";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);

                        if ($queryResult > 0) {
                            while ($row = mysqli_fetch_assoc($result)  AND $row2 = mysqli_fetch_assoc($propose)) {
                            echo"<img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                                 <div class='card-body'>
                                    <h5 class='card-title'>".$row['titre']."</h5>
                                    <p class='card-text'>".$row['chapo']."</p>
                                    <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                                      <div class='modal-dialog modal-lg'>
                                        <div class='modal-content'>
                                            <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                                            <br>
                                            <h4 class='card-title'style='padding-left: 10px;padding-right: 10px;'>".$row['titre']."</h4>
                                            <p class='card-text'style='padding-left: 10px;padding-right: 10px;'>".$row['chapo']."</p>
                                            <br>
                                            <h4 style='padding-left: 10px;padding-right: 10px;'>Détails</h4>
                                            <p class='card-text'style='padding-left: 10px;padding-right: 10px;'>Temps de cuisson : ".$row['tempsCuisson']."</p>
                                            <p class='card-text'style='padding-left: 10px;padding-right: 10px;'>Temps de préparation : ".$row['tempsPreparation']."</p>
                                            <p class='card-text'style='padding-left: 10px;padding-right: 10px;'>Difficulté : ".$row['difficulte']."</p>
                                            <p class='card-text'style='padding-left: 10px;padding-right: 10px;'>Prix : ".$row['prix']."</p>
                                            <br>
                                            <h4 style='padding-left: 10px;padding-right: 10px;'>Ingrédients</h4>
                                            <p class='card-text'>".$row['ingredient']."</p>
                                            <br>
                                            <h4 style='padding-left: 10px;padding-right: 10px;'>Préparation</h4>
                                            <p class='card-text'>".$row['preparation']."</p>
                                            <h5 class='card-text'>Proposé par : ".$row2['login']."</h5>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                 </div>";
                            }
                        } else {
                            echo "<p style='text-align:center;'>Aucun résultat</p>";
                        }
                    }
                ?>
    </div>
 </div>
 </div>
 <?php
    include 'footer.php';
?>