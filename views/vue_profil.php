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
    <title>CheckYourMood - Mon profil</title>
</head>
<body>
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