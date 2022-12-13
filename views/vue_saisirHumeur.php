<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        ?>
        <p class="espace3"></p>
        <form>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Humeur</label>
                    <select name="humeur" class="form-select">
                        <option value="">Saisir une humeur</option>
                        <option value="Colere">Colere</option>
                        <option value="Joie">Joie</option>
                        <option value="Nostagique">Nostagique</option>
                    </select>
                </div>
                <div class="col-3">
                    <label>Période de l'humeur</label><br>
                    <input name="dateTimeHumeur" type="datetime-local">
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5">
                    <label>Description</label>
                    <div class="form-floating">
                        <textarea name="commentaire" class="form-control" placeholder="Commentaire"></textarea>
                        <label for="floatingTextarea">Commentaire</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>Ajouter un/des fichiers</label><br>
                    <div class="file-upload">
                        <input name="fichiers" type="file" multiple/>
                        <i class="fa-sharp fa-solid fa-arrow-up-from-bracket"></i>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
</body>
</html>