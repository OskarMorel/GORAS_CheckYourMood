<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
  header('Location: /?controller=index');
}
?>
<body>
    <div class="container-fluid text-center">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        //var_dump($_SESSION);
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
            <div class="col notDraggable">
              <form action="/?controller=consultationhumeurs&action=consulter" method="POST">
                  <button class="zoom" type="submit">
                    <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id']) ?>">
                    <p class="icon-accueil">&#128301;</p>
                    <p class="texteBouton">Voir mes humeurs</p>
                  </button>
              </form>
            </div>
            <!-- Lien pour saisir une nouvelle humeur -->
            <div class="col notDraggable">
              <a href="/?controller=mexprimer">
                <button class="zoom">
                <p class="icon-accueil">&#128221;</p>
                <p class="texteBouton">M'exprimer !</p>
                </button>  
              </a>
            </div>
            <!-- Lien pour voir les statistiques des humeurs de l'utilisateur -->
            <div class="col">
              <a href="/?controller=visualisationHumeurs">
                <button class="zoom">
                <p class="icon-accueil">&#128200;</p>
                <p class="texteBouton">Statistiques sur mes humeurs</p>
                </button>  
              </a>
            </div>
            <div class="col-1"></div>
        </div>
        
    </div>
</body>
</html>