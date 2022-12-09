<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Icone de l'application -->
    <link rel="icon" href="../images/smiley.webp" />
    <!-- Liens vers les feuilles de styles -->
    <link href="../Style/checkYourMood.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Liens vers les scripts -->
    <script src="https://kit.fontawesome.com/dbb1bac2bf.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.js" crossorigin="Sources"></script>
    <title>CheckYourMood - Connexion</title>
</head>
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
                    <form>
                        <div class="cadreConnexion">
                            <p class="espace1"></p>
                            <h5 class="texteGris">Bienvenue, saisissez vos identifiants</h5>
                            <p class="espace1"></p>
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
                                    <input type="text" class="form-control" placeholder="Saisissez votre identifiant" required>
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
                                    <input type="text" class="form-control" placeholder="Saisissez votre mot de passe" required>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace1"></p>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <div class="d-grid"> 
                                        <a href="../vues/vue_accueil.html" class="btn btn-primary">Se connecter</a>
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