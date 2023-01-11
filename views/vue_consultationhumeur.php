<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
    header('Location: /?controller=index');
  }
?>
<body>

    <div class="container-fluid text-center">
        <?php
        require 'includes/navbar.php';
        //var_dump($_POST);
        //var_dump($tabEmotions);
        ?>
        <p class="espace1"></p>

        <h3>Vous pouvez consulter vos humeurs</h3>
        <p class="espace1"></p>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
                <form action="/?controller=consultationhumeurs&action=consulter" method="POST">
                    <input hidden value="<?php echo($_SESSION['id']); ?>">
                    <input class="form-control" name="dateSaisie" type="date">
            </div>
            <div class="col-2">
                    <select name="codeEmotion" class="form-select" required>
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
                </form>
            </div>
            <div class="col-1">
                    <input class="btn btn-success" type="submit" value="OK">
                </form>
            </div>
            <div class="col-4"></div>
        </div>
        <p class="espace1"></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <th class="col-1">Date et heure</th>
                        <th class="col-3">Emotion</th>
                        <th class="col-7">Description</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur toutes les humeurs
                        foreach($humeurs as $humeur){
                        ?>
                            <tr>
                                <td><?php echo($humeur['DATE_HEURE']) ?></td>
                                <td><?php echo($humeur['EMOJI'].' - '.$humeur['NOM']) ?></td>
                                <td><?php echo($humeur['DESCRIPTION']) ?></td>
                                <td><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalSuppr">Supprimer</button></td>
                                <!-- TODO faire les vérifs de pas de suppression si ça fait + de deux heure que l'humeur a été ajoutée--> 
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="modalSuppr">
            <!-- Modal contenant la confirmation de la suppression de l'humeur -->
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
