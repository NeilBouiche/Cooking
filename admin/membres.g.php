<?php
if (isset($update)) {
session_start();
}
 include 'admin.index.php';
 ?>
      <div class="row">
        <h2 class="col-12 title" style="margin-left: 15%;">Gestion des membres en détails</h2>
      </div>
      <div class="col-12">
        <?php
          if (isset($_SESSION['message'])) { ?>
            <div class="pop alert alert-<?=$_SESSION['msg_type']?>"><?php echo $_SESSION['message']; ?></div>
          <?php } ?>
        <?php
          echo "<p class='count'>Nombre d'utilisateurs inscrits: $row</p>";
         ?>
         <p>
            <a class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" href="#down" role="button" aria-expanded="false" aria-controls="collapseExample">Liste des membres</a>
        </p>
        <div class="collapse" id="collapseExample">
        <div class="card card-body" style="background:RGB(40, 44, 52);">
         <table class="infos table">
           <tr>
             <th colspan="2">Image</th>
             <th colspan="2">Login</th>
             <th colspan="2">Prenom</th>
             <th colspan="2">Nom</th>
             <th colspan="2">Date de création</th>
             <th colspan="2">Action</th>
           </tr>
                   <?php while ($row1 = mysqli_fetch_assoc($res)) { ?>
                     <tr>
                      <td colspan="2"><?php echo '<img src="gravatars/'.$row1['gravatar'].'"/>';?></td>
                      <td colspan="2"><?php echo $row1["login"] ?></td>
                      <td colspan="2"><?php echo $row1["prenom"] ?></td>
                      <td colspan="2"><?php echo $row1["nom"] ?></td>
                      <td colspan="2"><?php echo $row1["dateCrea"] ?></td>
                      <td>
                        <a href="membres.g.php?edit=<?php echo $row1['idMembre']; ?>"
                        class="btn btn-warning">Modifier</a>
                        <a href="membres.g.php?delete=<?php echo $row1['idMembre']; ?>"
                        class="btn btn-danger">Supprimer</a>
                      </td>
                    </tr>
                  <?php } ?>
         </table>
       </div>
     </div>
      <?php if ($update == true) { ?>
         <div class="row">
           <form method="post" enctype="multipart/form-data" class="form-inlin justify-content-center offset-3 col-6">
                <?php
                if (isset($_POST['update'])) {

                  if (empty($prenom) || empty($nom) || empty($pseudo) || empty($mdp) || empty($cmdp)) {
                    }
                   }
                   ?>
              <input type="hidden" name="idMembre" value="<?php echo $id; ?>">
             <div class="form-group">
               <label class="sr-only">Nom</label>
               <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" placeholder="Nom">
             </div>
             <br>
           <div class="form-group">
             <label class="sr-only">Prénom</label>
             <input type="text" name="prenom" value="<?php echo $prenom; ?>" class="form-control" placeholder="Prénom">
           </div>
           <br>
           <div class="form-group">
             <label class="sr-only">Pseudo</label>
             <input type="text" name="pseudo" value="<?php echo $login; ?>" class="form-control" placeholder="Pseudo">
           </div>
           <br>
             <br><br><br>
                <button type="submit" name="update" class="btn btn-info offset-4 button">Mettre à jour</button>
            </form>
          <?php } ?>
      </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
