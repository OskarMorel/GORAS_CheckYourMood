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
        //var_dump($description);
        //var_dump($dateHeure);
        //var_dump($codeEmotion);
        //var_dump($creation);
        ?>
        <p class="espace2"></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h5>Que ressentez vous ?</h5>
            </div>
            <div class="col-1"></div>
        </div>
        <?php if($creation) { ?>
            <!-- Si la creation s'est bien déroulée on affiche un message de validation -->
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        Votre humeur a bien été enregistrée
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <?php } ?>
        <p class="espace1"></p>
        <form action="/?controller=mexprimer&action=exprimer" method="POST">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Emotion</label>
                    <select name="newCodeEmotion" class="form-select" required>
                        <option value="">Saisir une émotion</option>
                        <?php 
                        foreach ($tabEmotions as $emotion){
                        ?>
                        <option <?php if (isset($codeEmotion)) {if ($codeEmotion == $emotion['ID_EMOTION']) {echo ('selected');}}?> 
                                value="<?php echo $emotion['ID_EMOTION']?>"><?php echo($emotion['EMOJI'].' - '.$emotion['NOM']) ?>
                        </option>
                        <?php
                        }  
                        ?>
                    </select>
                </div>
                <div class="col-3">
                    <label>Période de l'humeur</label><br>
                    <!-- Input caché pour avoir la date du jour de l'humeur 
                    <input hidden name="newDate" type="date" value="<?php /* mettre une fonction pour récuperer la date */ ?>">-->
                    <input class="form-control" name="newHeure" min="06:40" max="08:40" type="time" required value="<?php echo($heure); ?>">
                </div>
                <?php  
                //echo(time("Y/m/d"));
                //$date = "2023-01-05 08:00:00";
                //echo ($date->format('Y/m/d H:i:s'));
                
                ?>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Description</label>
                    <div class="form-floating">
                        <textarea name="newDescription" class="form-control" placeholder="Description"><?php  if (isset($description)) {echo($description);}?></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>Ajouter un ou des fichiers</label><br>
                    <div class="file-upload">
                        <input name="fichiers" type="file"/>
                        <i class="fa-sharp fa-solid fa-arrow-up-from-bracket"></i>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            <input type="text" name="newCodeUtilisateur" value="<?php echo ($_SESSION['id']);?>" hidden>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <input type="submit" value="Envoyer" class="btn btn-primary">
                </div>
                <div class="col-1"></div>
            </div>
        </form>
        <p class="espace4"></p>
    </div>
</body>
</html>