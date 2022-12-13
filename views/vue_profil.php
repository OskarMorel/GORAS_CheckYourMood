<?php
require 'includes/header.php';
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
    ?>
    <div class="container-fluid text-center">
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="gauche">
                    <label class="form-label">Nom</label>
                    <input value="Ezyquiel" disabled type="Text" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Prenom</label>
                    <input value="Martin" disabled type="Text" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Genre</label>
                    <select disabled class="form-select">
                        <option selected>Homme</option>
                        <option>Femme</option>
                        <option>LGBTQT3/8x9$€TREFLUID</option>
                        <option>Autre</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="gauche">
                    <label class="form-label">Email</label>
                    <input disabled value="ezyquiel.martin@gmail.com" type="email" class="form-control">
                </div>
                <p class="espace0"></p>
                <div class="gauche">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input disabled value="Martin12" type="text" class="form-control">
                </div>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace1"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col"><button type="button" class="btn btn-outline-primary">Modifier mes informations</button></div>
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