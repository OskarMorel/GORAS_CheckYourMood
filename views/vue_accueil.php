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
    <script src="https://kit.fontawesome.com/dbb1bac2bf.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <title>CheckYourMood - Accueil</title>
</head>
<body>
    <div class="container-fluid text-center">
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
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h3 class="rougeClair">Bonjour Martin,</h3>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace3"></p>

        <div class="row">
            <div class="col cadreMenu"> 
                <h4>Humeurs récentes :</h4> 
                <br>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../images/calendrier.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="texteNoir">Octobre 2022</h5>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../images/calendrier.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="texteNoir">Novembre 2022</h5>
                        </div>
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col">
                <div class="row d-grid gap-2">
                    <a type="button" class="btn btn-primary btn-lg" href="../vues/vue_saisirHumeur.html"><i class="fa-solid fa-plus"></i>&nbsp;M'exprimer !</a>
                </div>
                <p class="espace0"></p>
                <div class="row cadreMenu">
                    <h4 class="gauche">Ce mois ci :</h4>
                    <ul class="list-group">
                        <a href="../vues/vue_visualisationHumeurs.html">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                😠 Colere 
                                <span class="badge bg-primary rounded-pill">50</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                😂 Joie 
                                <span class="badge bg-primary rounded-pill">30</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                😥 Triste 
                                <span class="badge bg-primary rounded-pill">20</span>
                              </li>
                        </a>
                      </ul>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>