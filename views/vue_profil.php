<?php
require 'includes/header.php';
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
        $edition = false;
        var_dump($edition);
        var_dump($_SESSION);
    ?>
    
    <div class="container-fluid text-center">
        <p class="espace2"></p>
        <form action="/?controller=profil&action=modifierProfil" method="POST">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="gauche">
                        <label class="form-label">Nom</label>
                        <input <?php if (!$edition) { echo("disabled"); } ?> value="<?php echo($_SESSION['nom']); ?>" type="Text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Prenom</label>
                        <input <?php if (!$edition) { echo("disabled"); } ?> value="<?php echo($_SESSION['prenom']); ?>" type="Text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Genre</label>
                        <select <?php if (!$edition) { echo("disabled"); } ?> class="form-select">
                            <?php if ($_SESSION['genre'] == "homme") { ?>
                            <option value="homme" selected>homme</option>
                            <option value="femme">femme</option>
                            <option value="autre">autre</option>
                            <?php } else if ($_SESSION['genre'] == "femme") { ?>
                            <option value="homme">homme</option>
                            <option value="femme" selected>femme</option>
                            <option value="autre">autre</option>
                            <?php } else { ?>
                            <option value="homme">homme</option>
                            <option value="femme">femme</option>
                            <option value="autre" selected>autre</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="gauche">
                        <label class="form-label">E-Mail</label>
                        <input <?php if (!$edition) { echo("disabled"); } ?> value="<?php echo($_SESSION['mail']); ?>" type="email" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input <?php if (!$edition) { echo("disabled"); } ?> value="<?php echo($_SESSION['nom_utilisateur']); ?>" type="text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Date de naissance</label>
                        <input <?php if (!$edition) { echo("disabled"); } ?> value="<?php echo($_SESSION['date_naissance']); ?>" type="date" class="form-control">
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <p class="espace1"></p>
            <input hidden name="idUtilisateur" value="<?php echo($_SESSION['id']); ?>">
            <div class="row">
                <div class="col"></div>
                <div class="col"><input type="submit" value="Modifier mes informations" class="btn btn-outline-primary"></div>
                <div class="col"></div>
            </div>
        </form>

        <p class="espace0"></p>

        <!-- Partie de la vue pour se deinscrire de CheckYourMood -->

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

        <form action="/?controller=profil&action=supprimerProfil" method="POST">
            <input hidden name="idUtilisateur" value="<?php echo($_SESSION['id']); ?>">
            <div class="row">
                <div class="col"></div>
                <div class="col"><input type="submit" value="Supprimer mon compte" class="btn btn-outline-danger"></div>
                <div class="col"></div>
            </div>
        </form>

    </div>
</body>
</html>