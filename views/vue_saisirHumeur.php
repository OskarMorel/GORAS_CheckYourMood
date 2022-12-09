<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Icone de l'application -->
    <link rel="icon" href="../images/smiley.webp" />
    <!-- Liens vers les feuilles de styles -->
    <link href="../Style/checkYourMood.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Liens vers les scripts -->
    <script src="https://kit.fontawesome.com/dbb1bac2bf.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <title>CheckYourMood - M'exprimer</title>
</head>
<body>
    <div class="container-fluid">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light barreNavigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="../vues/vue_accueil.html">CheckYourMood</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <!-- Boutons pour afficher le profil et se déconnecter-->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../vues/vue_profil.html"><i class="fa-solid fa-user"></i>&nbsp;Profil</a>
                        </li>
                        <li>
                            <a class="nav-link" href="../vues/vue_connexion.html"> <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <p class="espace3"></p>
        <form>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Humeur</label>
                    <select name="humeur" class="form-select">
                        <option value="">Saisir une humeur</option>
                        <option value="Colere">Colere</option>
                        <option value="Joie">Joie</option>
                        <option value="Nostagique">Nostagique</option>
                    </select>
                </div>
                <div class="col-3">
                    <label>Période de l'humeur</label><br>
                    <input name="dateTimeHumeur" type="datetime-local">
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Description</label>
                    <div class="form-floating">
                        <textarea name="commentaire" class="form-control" placeholder="Commentaire"></textarea>
                        <label for="floatingTextarea">Commentaire</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>Ajouter un/des fichiers</label><br>
                    <div class="file-upload">
                        <input name="fichiers" type="file" multiple/>
                        <i class="fa-sharp fa-solid fa-arrow-up-from-bracket"></i>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
</body>
</html>