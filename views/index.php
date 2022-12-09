<?php
require 'views/includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <p class="espace3"></p>
        <div class="row">
            <div class="col">
                <h1>CheckYourMood</h1>
            </div>
        </div>
        <p class="espace1"></p>
        <div class="row">
            <div class="col"></div>
                <div class="col-4">
                    <form action="/?controller=connexion&action=connection" method="POST">
                        <div class="cadreConnexion">
                            <p class="espace1"></p>
                            <h5 class="texteGris">Bienvenue, saisissez vos identifiants</h5>
                            <p class="espace1"></p>
                            <?php
                            if (isset($_GET['err'])) {
                              $err = htmlspecialchars($_GET['err']);

                              switch ($err) {
                                case 'valide':
                            ?>
                            <div class="alert alert-danger">
                              <strong>valide</strong>
                            </div>
                            <?php
                                break;

                                case 'mdp':
                            ?>
                            <div class="alert alert-danger">
                              <strong>Mot de passe incorrect</strong>
                            </div>
                            <?php
                                break;

                                case 'identifiant':
                            ?>
                            <div class="alert alert-danger">
                              <strong>Identifiant inconnu</strong>
                            </div>
                            <?php
                                break;

                                case 'vide':
                            ?>
                            <div class="alert alert-danger">
                              <strong>Veuillez remplir les champs</strong>
                            </div>
                            <?php
                                break;
                              }
                            }
                            ?>
                            <!-- Identifiant -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col gauche">
                                    <label>Identifiant</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <input name="identifiant" type="text" class="form-control" placeholder="Saisissez votre identifiant" required>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace1"></p>
                            <!-- Mot de passe -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col gauche">
                                    <label>Mot de passe</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <input name="motDePasse" type="text" class="form-control" placeholder="Saisissez votre mot de passe" required>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace1"></p>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-primary">Se connecter</input>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace0"></p>
                            <div class="row">
                                <div class="col">Vous avez oublié votre mot de passe ? <a class="rougeClair" href="../vues/vue_oubliMotDePasse.html">Cliquez ici !</a></div>
                            </div>
                            <p class="espace0"></p>
                            <div class="row">
                                <div class="col">Pas encore inscrit ? <a class="rougeClair" href="../vues/vue_creationCompte.html">Cliquez ici !</a></div>
                            </div>
                            <p class="espace1"></p>
                        </div>
                    </form>
                </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>
