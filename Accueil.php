<?php include 'index.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Accueil.css">
</head>

<body>

    <div class="container">
        <div id="carousel" class="carousel slide col-12" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php
                    $connexion = mysqli_connect('localhost', 'root', 'root', 'Cooking');
                    $a=0;
                    $query = "SELECT * FROM recettes";
                    $sql = mysqli_query($connexion,$query);
                    while($row=mysqli_fetch_array($sql)){
                        ?>
                        <li data-target="#carousel" data-slide-to="<?php echo $a++;?>"></li>
                        <?php 
                    }
                ?>
                </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    $controle_active = 2;
                    $query2 ="SELECT * FROM recettes";
                    $sql2 = mysqli_query($connexion,$query2);
                    while($img=mysqli_fetch_array($sql2)){
                            if($controle_active == 2){ ?>
                                <div class="carousel-item active">
                                    <img src="recettes/<?php echo $img['img'];?>" class="d-block w-100 responsive" alt="<?php echo $img['img'];?>">
                                 </div>
                                 <?php
                                 $controle_active = 1;
                            } else{ ?>
                            <div class="carousel-item">
                                <img src="recettes/<?php echo $img['img'];?>" class="d-block w-100 responsive" alt="<?php echo $img['img'];?>">
                             </div>
                             <?php
                            }
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h1 class="titre col-12">Recettes du moment</h1>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <?php
                    $bdd = new PDO("mysql:host=localhost;dbname=Cooking;charset=utf8","root","root");
                    $query3 = $bdd->query("SELECT img FROM recettes WHERE idRecette = 2");
                    $sql3 = $query3->fetch();
                    echo('<img class="recette_photo" src="recettes/'.$sql3['img'].'"');
                ?> 
            </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                <?php
                    $query4 = $bdd->query("SELECT titre,chapo FROM recettes WHERE idRecette = 2");
                    $sql4 = $query4->fetch();
                    echo('<h3 class="recette_titre">'.$sql4['titre'].'</h3>');
                    echo('<p class="recette_description">'.$sql4['chapo'].'</p>');
                ?>    
            </div>
        </div>
        <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <?php
                    $query4 = $bdd->query("SELECT titre,chapo FROM recettes WHERE idRecette = 3");
                    $sql4 = $query4->fetch();
                    echo('<h3 class="recette_titre2">'.$sql4['titre'].'</h3>');
                    echo('<p class="recette_description2">'.$sql4['chapo'].'</p>');
                ?>    
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                <?php
                    $query3 = $bdd->query("SELECT img FROM recettes WHERE idRecette = 3");
                    $sql3 = $query3->fetch();
                    echo('<img class="recette_photo2" src="recettes/'.$sql3['img'].'"');
                ?> 
        </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <?php
                    $query3 = $bdd->query("SELECT img FROM recettes WHERE idRecette = 4");
                    $sql3 = $query3->fetch();
                    echo('<img class="recette_photo3" src="recettes/'.$sql3['img'].'"');
                ?> 
            </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                <?php
                    $query4 = $bdd->query("SELECT titre,chapo FROM recettes WHERE idRecette = 4");
                    $sql4 = $query4->fetch();
                    echo('<h3 class="recette_titre3">'.$sql4['titre'].'</h3>');
                    echo('<p class="recette_description3">'.$sql4['chapo'].'</p>');
                ?>    
            </div>
        </div>
        <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <?php
                    $query4 = $bdd->query("SELECT titre,chapo FROM recettes WHERE idRecette = 5");
                    $sql4 = $query4->fetch();
                    echo('<h3 class="recette_titre2">'.$sql4['titre'].'</h3>');
                    echo('<p class="recette_description2">'.$sql4['chapo'].'</p>');
                ?>    
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                <?php
                    $query3 = $bdd->query("SELECT img FROM recettes WHERE idRecette = 5");
                    $sql3 = $query3->fetch();
                    echo('<img class="recette_photo2" src="recettes/'.$sql3['img'].'"');
                ?> 
        </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>