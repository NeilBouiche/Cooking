<?php
include 'index.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recettes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="recettes.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="separateur">
                <h1>C</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10" style="margin-top: 10%;">
                <?php
                $login = "SELECT DISTINCT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'C%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#c_".$row['idRecette']."'>Recette complète</button>

                                <div class='modal fade bd-example-modal-lg' id='c_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>G</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'G%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#g_".$row['idRecette']."''>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='g_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>L</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'L%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#l_".$row['idRecette']."'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='l_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>M</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'M%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#m_".$row['idRecette']."'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='m_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>N</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'N%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#n_".$row['idRecette']."'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='n_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>P</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'P%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#p_".$row['idRecette']."'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='p_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
        <div class="row">
            <div class="separateur">
                <h1>R</h1>
            </div>
            <div class="card-deck mx-auto col-10 col-sm-10 " style="margin-top: 10%;">
                <?php
                $login = "SELECT m.login FROM membres m, recettes r WHERE m.idMembre = r.idMembre";
                $propose = mysqli_query($conn, $login);
                $requeteResultat = mysqli_num_rows($propose);

                $sql = "SELECT * FROM recettes WHERE titre LIKE 'R%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result) AND $row2 = mysqli_fetch_assoc($propose)) {
                echo"<div class='card'>
                        <img src=recettes/".$row['img']." class='card-img-top' alt=".$row['img'].">
                            <div class='card-body'>
                                <h5 class='card-title'>".$row['titre']."</h5>
                                <p class='card-text'>".$row['chapo']."</p>
                                <button style='background-color: #FFE2C3;border-color: #FFE2C3; color: grey;' type='button' class='btn btn-primary' data-toggle='modal' data-target='#r_".$row['idRecette']."'>Recette complète</button>

                                    <div class='modal fade bd-example-modal-lg' id='r_".$row['idRecette']."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
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
            }
            ?>
        </div>
        </div>
    </div>
</body>
</html>
<?php include 'footer.php'?>
