<?php
require 'includes/header.php';
session_start();
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
        var_dump($_SESSION);
    ?>
    
    <div class="container-fluid text-center">
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="gauche">
                    <label class="form-label">Nom</label>
                    <input value="<?php echo($_SESSION['nom']); ?>" disabled type="Text" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Prenom</label>
                    <input value="<?php echo($_SESSION['prenom']); ?>" disabled type="Text" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Genre</label>
                    <select disabled class="form-select">
                        <option selected><?php echo $_SESSION['genre'] ?></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="gauche">
                    <label class="form-label">E-Mail</label>
                    <input disabled value="<?php echo($_SESSION['mail']); ?>" type="email" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input disabled value="<?php echo($_SESSION['nom_utilisateur']); ?>" type="text" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Date de naissance</label>
                    <input disabled value="<?php echo($_SESSION['date_naissance']); ?>" type="date" class="form-control">
                </div>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace1"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col"><a href="/?controller=profil&action=modifierProfil"class="btn btn-outline-primary">Modifier mes informations</a></div>
            <div class="col"></div>
        </div>
        <p class="espace0"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col"><button type="button" class="btn btn-outline-danger">Supprimer mon compte</button></div>
            <div class="col"></div>
        </div>
        
    </div>
</body>
</html>