<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
    header('Location: /?controller=index');
}
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
        $edition = false;
        //var_dump($edition);
        //var_dump($_SESSION);
    ?>
<!-- Partie modification des données de l'utilisateur -->
    <div class="container-fluid text-center">
        <p class="espace1"></p>
        <h2>Modification de votre profil</h2>
        <p class="espace1"></p>
        <form action="/?controller=modificationprofil&action=modifierProfil" method="POST">
            <?php if($modification) { ?>
                <!-- Si la creartion s'est bien déroulée on affiche un message de validation -->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            La modification de votre profil a été effectuée ! 
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            <?php }?>

                <?php if(!$modification && $identifiantDejaUtilise) { ?>
                <!-- Si l'identifiant existe déjà dans la base de données -->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Erreur ! L'identifiant <?php echo ($nomUtilisateur);?> est deja utilisé.
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            <?php } ?>

                <?php if($mail != null && !$mailOK) { ?>
                <!-- L'email n'est pas valide -->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            Le format de l'adresse mail n'est pas valide. <br>
                            Une adresse mail doit avoir le format suivant : <b>xxxxx@xxxxxx.xx</b>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            <?php } ?>
            
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="col gauche">
                        <label for="newNom"  class="form-label">Nom</label>
                        <input pattern="\w{2,80}" title="Le nom  ne doit pas depass er 80 caractere" name="newNom" value="<?php if ($nomOK) { echo($nom); } else {echo($_SESSION['nom']);} ?>" type="Text" placeholder="Saisissez votre nom" class="form-control <?php if ($nomOK) { echo 'is-valid'; } ?>" required>
                    </div>
                    <p class="espace0"></p>
                    <div class="col gauche">
                        <label for="newPrenom" class="form-label">Prenom</label>
                        <input pattern="\w{2,80}" title="Le prenom ne doit pas depasser 80 caractere" name="newPrenom" value="<?php if ($prenomOK) { echo $prenom; } else {echo($_SESSION['prenom']);}?>" type="Text" placeholder="Saisissez votre prenom" class="form-control <?php if ($prenomOK) { echo 'is-valid'; } ?>" required>
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Genre <i>(optionnel)</i></label>
                        <select class="form-select" name="newGenre">
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
                    <p class="espace0"></p>
                </div>
                <div class="col">
                    <div class="col gauche">
                        <label for="newMail" class="form-label">Adresse Mail</label>
                        <input name="newMail" value="<?php if ($mailOK) { echo $mail; } else {echo($_SESSION['mail']);} ?>" type="Text" placeholder="Saisissez votre adresse mail" class="form-control <?php if ($mailOK) { echo 'is-valid'; } ?>" required>
                    </div>
                    <p class="espace0"></p>
                    <div class="col gauche">
                        <label for="newNomUtilisateur" class="form-label">Nom d'utilisateur</label>
                        <input pattern="\w{2,80}" title="Le nom d'utilisateur ne doit pas depasser 80 caractere" name="newNomUtilisateur" value="<?php if ($nomUtilisateurOK) {echo $nomUtilisateur;} else {echo ($_SESSION['nom_utilisateur']);}?>" type="Text" placeholder="Saisissez votre nom d'utilisateur" class="form-control <?php if ($nomUtilisateurOK) { echo 'is-valid'; } ?>" required>
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Date de naissance <i>(optionnel)</i></label>
                        <input value="<?php echo($_SESSION['date_naissance']); ?>" type="date" class="form-control" name="newDateNaissance">
                    </div>
                    <p class="espace0"></p>
                </div>
                <div class="col"></div>
            </div>
            <p class="espace1"></p>
            <input hidden name="idUtilisateur" value="<?php echo($_SESSION['id']); ?>">
            <input type="submit" value="Valider modification" class="btn btn-primary">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                </div>
                <div class="col"></div>
            </div>
        </form>
        <p class="espace0"></p>
        <form action="/?controller=profil" method="POST">
            <input type="submit" value="Annuler" class="btn btn-danger">
        </form>
        <!-- TODO lien vers vue de modification du mot de passe -->
    </div>
</body>
</html>
