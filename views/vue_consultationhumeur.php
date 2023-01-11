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
        
        ?>
        <p class="espace1"></p>

        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                        <a class="page-link">Precedent</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

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
