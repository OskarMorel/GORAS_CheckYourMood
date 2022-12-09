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
    <title>CheckYourMood - Statistiques</title>
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
                <h3 class="rougeClair">Martin voici la répartition de vos humeurs,</h3>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace2"></p>

        <?php 
        $choix = "test";
        echo $choix;
        ?>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
              <div class="carousel-item">
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

        <!--
        <div class="row ">
            <div class="col-1"></div>
            <div class="col">
                <div class="progress" style="height: 35px;">
                    <div class="progress-bar" role="progressbar" aria-label="Example" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">😠 Colere (50%)</div>
                </div>
                <p class="espace0"></p>
                <div class="progress" style="height: 35px;">
                    <div class="progress-bar" role="progressbar" aria-label="Example" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">😂 Joie (30%)</div>
                </div>
                <p class="espace0"></p>
                <div class="progress" style="height: 35px;">
                    <div class="progress-bar" role="progressbar" aria-label="Example" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">😥 Triste (20%)</div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        -->
    </div>
</body>
</html>