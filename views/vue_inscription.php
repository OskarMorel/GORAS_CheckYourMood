<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <p class="espace2"></p>
        <div class="row">
            <div class="col">
                <h1>CheckYourMood</h1>
            </div>
        </div>
        <p class="espace0"></p>
        <div class="row">
            <div class="col">
                <h3>Creation d'un nouveau compte</h3>
            </div>
        </div>
        <p class="espace2"></p>
        <form>
            <!-- Partie nom, prenom, nom d'utilisateur, adresse mail-->
            <div class="row">
                <div class="col-1"></div>
                <div class="col gauche">
                    <label class="form-label">Nom</label>
                    <input name="nom" type="Text" placeholder="Saisissez votre nom" class="form-control">
                </div>
                <div class="col gauche">
                    <label class="form-label">Prenom</label>
                    <input name="prenom" type="Text" placeholder="Saisissez votre prenom" class="form-control">
                </div>
                <div class="col gauche">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input name="nomUtilisateur" type="Text" placeholder="Saisissez votre nom d'utilisateur" class="form-control">
                </div>
                <div class="col gauche">
                    <label class="form-label">Adresse Mail</label>
                    <input name="adresseMail" type="Text" placeholder="Saisissez votre adresse mail" class="form-control">
                </div>
                <div class="col-1"></div>
            </div>
            <p class="espace0"></p>
             <!-- Partie genre, date de naissance, mot de passe, et confirmation mot de passe -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col gauche">
                    <label class="form-label">Genre</label>
                    <select class="form-select" name="genre" id="">
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="col gauche">
                    <label class="form-label">Date de naissance</label>
                    <input name="dateNaissance" type="date" class="form-control">
                </div>
                <div class="col gauche">
                    <label class="form-label">Mot de passe</label>
                    <input name="motDePasse1" type="Text" placeholder="Saisissez votre mot de passe" class="form-control">
                </div>
                <div class="col gauche">
                    <label class="form-label">Confirmation de mot de passe</label>
                    <input name="motDePasse2" type="Text" placeholder="Confirmez votre mot de passe" class="form-control">
                </div>
                <div class="col-1"></div>
            </div>
            <p class="espace2"></p>
            <!-- Bouton s'inscrire -->
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-lg"  id="btnNotificationCreation">S'inscrire</button>
                </div>
            </div>
            <p class="espace0"></p>
            <!-- Bouton pour aller se connecter -->
            <div class="row">
                <div class="col">
                    <a class="link-secondary" href="../vues/vue_connexion.html">J'ai déjà un compte</a>
                </div>
            </div>
            <p class="espace1"></p>
        </form>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="notificationCreation" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">CheckYourMood</strong>
                <small>A l'instant</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fermer"></button>
            </div>
            <div class="toast-body gauche">
                Votre compte a bien été crée.
                <br>
                Un mail de de confirmation vous a été envoyé.
            </div>
        </div>
        </div>

        <script>
            const notificationTrigger = document.getElementById('btnNotificationCreation')
            const toastNotificationCreation = document.getElementById('notificationCreation')
            if (notificationTrigger) {
                notificationTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastNotificationCreation)
                toast.show()
            })
            }
        </script>
        

    </div>
</body>
</html>