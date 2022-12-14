<?php
require 'includes/header.php';
session_start();
?>
<body>
    <div class="container-fluid text-center">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        var_dump($_SESSION);
        ?>
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h3 class="rougeClair">Bonjour <?php echo$_SESSION['prenom'].' '.$_SESSION['nom'] ?></h3>
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