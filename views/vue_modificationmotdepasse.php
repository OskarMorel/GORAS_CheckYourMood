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
        <h2>Modification de votre mot de passe</h2>
        <p class="espace1"></p>
        <?php
            if (isset($_GET['err'])) {
        ?>
        <!-- Affichage des erreurs -->
        <div class="row">
            <div class="col-1"></div>
            
                <?php
                    $err = htmlspecialchars($_GET['err']);

                    switch ($err) {
                        case 'mdp':
                ?>
                <div class="col alert alert-warning">
                    <strong>Mot de passe incorrect</strong>
                </div>
                <?php
                    break;
                    case 'vide':
                ?>
                <div class="col alert alert-warning">
                    <strong>Veuillez remplir les champs</strong>
                </div>
                <?php
                    break;     
                    case 'nope':       
                ?>
                    <div class="col alert alert-success">
                        <strong>Modification du mot de passe effectuée</strong>
                    </div>
                <?php break; } ?>
                <div class="col-1"></div>
            </div>
        <?php } ?>
        <p class="espace1"></p>
        <form action="/?controller=modificationmotdepasse&action=modifierMotDePasse" method="POST">
            <div class="row">
                <div class="col-3"></div>
                <div class="col gauche">    
                    <label for="motDePasseActuel">Saisissez votre mot de passe actuel</label>
                    <input name="motDePasseActuel" type="password" class="form-control" placeholder="Saisissez votre mot de passe actuel">
                </div>
                <div class="col-3"></div>
                <p class="espace1"></p>
                <div class="col-3"></div>
                <div class="col gauche">
                    <label for="nouveauMotDePasse">Saisissez votre nouveau mot de passe</label>
                    <input name="nouveauMotDePasse" type="password" class="form-control" placeholder="Saisissez votre nouveau mot de passe">
                </div>
                <div class="col-3"></div>
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