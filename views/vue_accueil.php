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
                <h3 class="rougeClair">Bonjour <?php echo$_SESSION['prenom'].' '.$_SESSION['nom'] ?></h3>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace3"></p>

        <div class="row">
            <div class="col-1"></div>
            <div class="col">
              <p class="espace2"></p>
              <a href="/?controller=visualisationHumeurs">Voir mes humeurs</a>
              <p class="espace4"></p>
            </div>
            <div class="col alert alert-primary">
              <div class="buttonPerso">
                <p class="espace2"></p>
                <a href="/?controller=mexprimer">M'exprimer !</a>
                <p class="espace4"></p>
              </div>
              
            </div>
            <div class="col">
              <p class="espace2"></p>
              <a href="">Voir les statistiques sur mes humeurs</a>
              <p class="espace4"></p>
            </div>
            <div class="col-1"></div>
        </div>
        
    </div>
</body>
</html>