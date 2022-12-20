<?php
require 'includes/header.php';
session_start();
?>
<body>
    <div class="container-fluid text-center">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        ?>
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1 class="rougeClair">Bonjour <?php echo$_SESSION['prenom'].' '.$_SESSION['nom'] ?></h1>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace3"></p>

        <div class="row">
            <div class="col-1"></div>
            <!-- Lien vers les humeurs de l'utilisateur -->
            <div class="col">
              <a href="/?controller=visualisationHumeurs">
                <div class="zoom">
                <p class="texteBouton">Voir mes humeurs</p>
                </div>  
              </a>
            </div>
            <!-- Lien pour saisir une nouvelle humeur -->
            <div class="col">
              <a href="/?controller=mexprimer">
                <div class="zoom">
                <p class="texteBouton">M'exprimer !</p>
                </div>  
              </a>
            </div>
            <!-- Lien pour voir les statistiques des humeurs de l'utilisateur -->
            <div class="col">
              <a href="/?controller=consultationHumeurs">
                <div class="zoom">
                <p class="texteBouton">Voir les statistiques sur mes humeurs</p>
                </div>  
              </a>
            </div>
            <div class="col-1"></div>
        </div>
        
    </div>
</body>
</html>