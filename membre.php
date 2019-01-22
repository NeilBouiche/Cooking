<?php
    include 'index.php';
?>
<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * FROM membres";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        echo('<div class="card-deck" style="margin-top: 20%;">
                <div class="card" style="width: 15rem; margin-right: 50px;">
                    <a data-toggle="modal" data-target="#myModal'.$row['idMembre'].'">
                        <img class="card-img-top" src="gravatars/'.$row['gravatar'].'" alt="gravatars/'.$row['gravatar'].'">
                    </a>
                    <div class="modal fade" id="myModal'.$row['idMembre'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-content">
                            <div class="modal-dialog">
                                <img src="gravatars/'.$row['gravatar'].'" class="card-img-top" alt="gravatars'.$row['gravatar'].'">
                                <br>
                                <br>
                                <p class="card-text"style="padding-left: 10px;padding-right: 10px;">Pseudo : '.$row['login'].'</p>
                                <br>
                                <p class="card-text"style="padding-left: 10px;padding-right: 10px;">Prénom : '.$row['prenom'].'</p>
                                <br>
                                <p class="card-text"style="padding-left: 10px;padding-right: 10px;">Nom : '.$row['nom'].'</p>
                                <br>
                                <p class="card-text"style="padding-left: 10px;padding-right: 10px;">Date d\'inscription : '.$row['dateCrea'].'</p>
                            </div>
                        </div>
                    </div>
                <div class="card-body" style="background-color: #FFE2C3;">
                    <h4 class="card-text" style="text-align: center;">'.$row['prenom'].'</h4>
                </div>
            </div
            </div>
            </div>');
            }
        }
        ?>
    </div>
</div>
<?php
    include 'footer.php';
?>
