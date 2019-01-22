<?php
if (isset($update)) {
  session_start();
};
include 'admin.index.php'; ?>
</div>
<div class="container">
<div class="row">
  <?php
    if (isset($_SESSION['message'])) { ?>
      <div class="pop alert alert-<?=$_SESSION['msg_type']?>"><?php echo $_SESSION['message']; ?></div>
    <?php } ?>
        <h2 class="col-12 title" style="margin-left: 15%;">Gestion des membres en détails</h2>
      </div>
</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php
          echo "<p class='count'>Nombre de recettes: $row2</p>";
         ?>
         <p>
            <a class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" href="#down" role="button" aria-expanded="false" aria-controls="collapseExample">Liste des recettes</a>
        </p>
        <div class="collapse" id="collapseExample">
              <div class="card card-body" style="background:RGB(40, 44, 52);">
                <table class="infos table" id="down">
                   <tr>
                     <th colspan="5">Image</th>
                     <th colspan="5">Titre</th>
                     <th colspan="5">Chapo</th>
                     <th colspan="5">Préparation</th>
                     <th colspan="5">Ingrédient</th>
                     <th colspan="5">DateCrea</th>
                     <th colspan="5">Temps de cuisson</th>
                     <th colspan="5">Temps de Préparation</th>
                     <th colspan="5">Difficulté</th>
                     <th colspan="5">Prix</th>
                     <th colspan="5">Action</th>
                   </tr>
                           <?php while ($row2 = mysqli_fetch_assoc($res2)) { ?>
                             <tr>
                              <td colspan="5"><?php echo '<img src="recettes/'.$row2['img'].'"/>';?></td>
                              <td colspan="5"><?php echo $row2["titre"] ?></td>
                              <td colspan="5"><?php echo $row2["chapo"] ?></td>
                              <td colspan="5"><?php echo $row2["preparation"] ?></td>
                              <td colspan="5"><?php echo $row2["ingredient"] ?></td>
                              <td colspan="5"><?php echo $row2["dateCrea"] ?></td>
                              <td colspan="5"><?php echo $row2["tempsCuisson"] ?></td>
                              <td colspan="5"><?php echo $row2["tempsPreparation"] ?></td>
                              <td colspan="5"><?php echo $row2["difficulte"] ?></td>
                              <td colspan="5"><?php echo $row2["prix"] ?></td>
                              <td>
                                <a href="recettes.g.php?edit=<?php echo $row2['idRecette']; ?>"
                                class="btn btn-warning">Modifier</a>
                                <a href="recettes.g.php?delete=<?php echo $row2['idRecette']; ?>"
                                class="btn btn-danger">Supprimer</a>
                              </td>
                            </tr>
                          <?php } ?>
                 </table>
               </div>
             </div>
          </div>
        </div>
    </div>
      <?php if ($update2 == true) { ?>
         <div class="container"></div>
         <div class="row">
           <form method="post" enctype="multipart/form-data" class="form-inlin justify-content-center offset-3 col-6">
                <?php
                if (isset($_POST['update2'])) {

                  if (empty($titre) || empty($chapo) || empty($preparation) || empty($ingredient) || empty($tempsCuisson) || empty($tempsPreparation) || empty($difficulte) || empty($prix)) {
                    }
                   }
                   ?>
              <input type="hidden" name="idRecette" value="<?php echo $id; ?>">
             <div class="form-group">
               <label class="sr-only">Titre</label>
               <input type="text" name="titre" value="<?php echo $titre; ?>" class="form-control" placeholder="Titre">
             </div>
             <br>
           <div class="form-group">
             <label class="sr-only">Chapo</label>
             <input type="text" name="chapo" value="<?php echo $chapo; ?>" class="form-control" placeholder="Chapo">
           </div>
           <br>
           <div class="form-group">
             <label class="sr-only">Préparation</label>
             <input type="text" name="preparation" value="<?php echo $preparation; ?>" class="form-control" placeholder="Préparation">
           </div>
           <div class="form-group">
             <label class="sr-only">Ingrédient</label>
             <input type="text" name="ingredient" value="<?php echo $ingredient; ?>" class="form-control" placeholder="Igrédient">
           </div>
           <div class="form-group">
             <label class="sr-only">Temps de cuisson</label>
             <input type="text" name="tempsCuisson" value="<?php echo $tempsCuisson; ?>" class="form-control" placeholder="Temps de cuisson">
           </div>
           <div class="form-group">
             <label class="sr-only">Temps de prépatation</label>
             <input type="text" name="tempsPreparation" value="<?php echo $tempsPreparation; ?>" class="form-control" placeholder="Temps de préparation">
           </div>
           <div class="form-group">
             <label class="sr-only">Difficulté</label>
             <input type="text" name="difficulte" value="<?php echo $difficulte; ?>" class="form-control" placeholder="Difficulté">
           </div>
           <div class="form-group">
             <label class="sr-only">Prix</label>
             <input type="text" name="prix" value="<?php echo $prix; ?>" class="form-control" placeholder="Prix">
           </div>
           <br>
             <br><br><br>
                <button type="submit" name="update2" class="btn btn-info offset-4 button">Mettre à jour</button>
            </form>
          <?php } ?>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
