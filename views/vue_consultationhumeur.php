<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
    header('Location: /?controller=index');
  }
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
    ?>
    <div class="container-fluid text-center">
        <h3>Vous pouvez consulter vos humeurs</h3>
        <p class="espace1"></p>
        <!-- Filtres pour consulter -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
                <form action="/?controller=consultationhumeurs&action=consulter" method="POST">
                    <input hidden value="<?php echo($_SESSION['id']); ?>" name="codeUtilisateur">
                    <input class="form-control" value="<?php if (isset($dateSaisie)) {echo ($dateSaisie);}?>" name="dateSaisie" type="date">
            </div>
            <div class="col-2">
                    <select name="codeEmotion" class="form-select">
                        <option value="">Sélectionnez une émotion</option>
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
            <div class="col-1">
                    <input class="btn btn-success" type="submit" value="OK">
                </form>
            </div>
            <div class="col-4"></div>
        </div>
        <p class="espace1"></p>
        <!-- Table presentant les humeurs -->
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <th class="col-2">Date et heure</th>
                        <th class="col-3">Emotion</th>
                        <th class="col-6">Description</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur toutes les humeurs
                        foreach($humeurs as $humeur){
                            $dateHeure=date_create($humeur['DATE_HEURE']);
                        ?>
                            <tr>
                                <td><?php echo "Le ".date_format($dateHeure,"Y/m/d")." à ".date_format($dateHeure,"H")."h".date_format($dateHeure,"i") ?></td>
                                <td><?php echo($humeur['EMOJI'].' - '.$humeur['NOM']) ?></td>
                                <td><?php echo($humeur['DESCRIPTION']) ?></td>
                                <td><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalSuppr">Supprimer</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal contenant la confirmation de la suppression de l'humeur -->
            <div class="modal fade" id="modalSuppr">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation de suppression d'une humeur </h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Vous êtes sur le point de supprimer une humeur. Confirmez-vous cette suppression ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form action="/?controller=consultationHumeurs&action=supprimer" method="POST">
                                <input type="text" name="codeEmotionASuppr" value="<?php echo $humeur['CODE_EMOTION']?>" class="btn btn-outline-danger" hidden>
                                <input type="text" name="dateEmo" value="<?php echo $humeur['DATE_HEURE']?>" class="btn btn-outline-danger" hidden>
                                <input name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>" hidden>
                                <input type="submit" value="Confirmer la suppression" class="btn btn-outline-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
</html>
