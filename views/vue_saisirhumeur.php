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
        //var_dump($_GET);
        ?>
        <p class="espace2"></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h4>Que ressentez vous ?</h4>
            </div>
            <div class="col-1"></div>
        </div>
        <?php if(isset($humeursaisie) && $humeursaisie) { ?>
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
        <?php if(isset($dateHeureOK) && !$dateHeureOK) { ?>
            <!-- Heure incorrete on affiche un message pour preciser un format valide -->
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Heure incorrecte, vous ne pouvez renseigner au maximum une période de 2 heures auparavant.
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
                    <label>Période (depuis les 2 dernières heures)</label><br>
                    <input class="form-control" name="newDateHeure" type="datetime-local" required value="<?php echo($dateHeure); ?>">
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <label>Description</label>
                    <div class="form-floating">
                        <textarea name="newDescription" class="form-control" placeholder="Description"><?php  if (isset($description)) {echo($description);}?></textarea>
                        <label for="floatingTextarea">Description</label>
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
