<?php
require 'includes/header.php';
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
        $edition = false;
        //var_dump($edition);
        //var_dump($_SESSION);
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

        <!-- Boutton pour afficher le modal contenant le formulaire de deinscription -->
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1">Me déinscrire</button>

        <!-- Modal contenant le formulaire de deinscription et qui appelle le controller profil et l'action supprimer profil -->
        <div class="modal fade" id="modal1">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation de déinscription </h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Vous etes sur le point de vous déinscrire de CheckYourMood. <br><br>
                        En cliquant sur <b>me déinscrire de CheckYourMood</b> vous ne pourrez plus acceder au services de CheckYourMood et vos données personnelles seront supprimées.

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <!-- Formulaire avec un input caché qui contient l'id de l'utilisateur -->
                        <form action="/?controller=profil&action=supprimerProfil" method="POST">
                            <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id']); ?>">
                            <input type="submit" value="Me déinscrire de CheckYourMood" data-bs-dismiss="modal" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>