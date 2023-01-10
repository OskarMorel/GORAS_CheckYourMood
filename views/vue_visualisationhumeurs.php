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
        //var_dump($choixVisualisation);
        //var_dump($humeurs);
        //var_dump($_SESSION);
        ?>
        <p class="espace1"></p>
        <div class="row">
            <div class="col"></div>
            <h5>Choisissez comment vous visualiser vos humeurs</h5><br>
            <p class="espace0"></p>
            <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">

                <input hidden name="choixVisualisation" value="camembert" type="text" id="camembert">

                <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">

                <input type="submit" value="Diagramme camembert" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'camembert') {echo('-outline');}}?>-secondary">

            </form>
            <p class="espace0"></p>
            <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">

                <input hidden name="choixVisualisation" value="baton" type="text" id="baton">

                <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">

                <input type="submit" value="Diagramme baton" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'baton') {echo('-outline');}}?>-secondary">
            </form>
            </div>
            <div class="col"></div>
            <p class="espace0"></p>
            <div class="col"></div>   
            <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">

                <input hidden name="choixVisualisation" value="graphique" type="text" id="graphique">

                <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">

                <input type="submit" value="Graphique" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'graphique') {echo('-outline');}}?>-secondary">
            </form>
            </div>
            <div class="col"></div>
        </div>
        <p class="espace2"></p>

        
        <?php 
            if ($choixVisualisation == 'camembert') {   
        ?>    
        <div class="row">

            <div class="col-2"></div>
            <div class="col">
                <canvas id="camembertChart" style="width:1000px;height:420px"></canvas>
            </div>
            <div class="col-2"></div>
        </div>
        <script>
            new Chart(document.getElementById("camembertChart"), {
                type: 'pie',
                data: {
                labels: ["Admiration", "Adoration", "Appréciation esthétique", "Amusement", "Colère", "Anxiété", 
                "Émerveillement", "Malaise", "Ennui", "Calme", "Confusion", "Envie", "Dégoût", "Douleur empathique", 
                "étonné", "Excitation", "Peur", "Horreur", "Intérêt", "Joie", "Nostalgie", "Soulagement", 
                "Romance", "Tristesse", "Satisfaction", "Désir sexuel", "Surprise", ],
                datasets: [{
                    label: "Ajout",
                    backgroundColor: ["#d7a7ff", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a48ce4","#b6d7a8","#8cace4",
                    "#e48c8c","#f7df7c","#2f90a8","#e32b2b","#351431","#eee7cf","#4b5e20","#c9b9ad","#8700ff","#3e95cd","#f2cfb4","	#fc7a08","#000000","#98d400",
                    "#f50b86","#1d2564","#05f9e2","#e2f705","#ff6f00"],
                    data: <?php echo $humeursStat ?>
                }]
                },
                options: {
                title: {
                    display: true,
                    text: 'Moyenne de vos humeurs'
                }
                }
            });
        </script>
        

        <?php 
            } else if ($choixVisualisation == 'baton') {
        ?>
        <div class="row">

            <div class="col-2"></div>
            <div class="col">
                <canvas id="barChart" style="width:1000px;height:420px"></canvas>
            </div>
            <div class="col-2"></div>
        </div>
        <script>
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                labels: ["Admiration", "Adoration", "Appréciation esthétique", "Amusement", "Colère", "Anxiété", 
                "Émerveillement", "Malaise", "Ennui", "Calme", "Confusion", "Envie", "Dégoût", "Douleur empathique", 
                "étonné", "Excitation", "Peur", "Horreur", "Intérêt", "Joie", "Nostalgie", "Soulagement", 
                "Romance", "Tristesse", "Satisfaction", "Désir sexuel", "Surprise", ],
                datasets: [
                    {
                    label: "Ajout",
                    backgroundColor: ["#d7a7ff", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a48ce4","#b6d7a8","#8cace4",
                    "#e48c8c","#f7df7c","#2f90a8","#e32b2b","#351431","#eee7cf","#4b5e20","#c9b9ad","#8700ff","#3e95cd","#f2cfb4","	#fc7a08","#000000","#98d400",
                    "#f50b86","#1d2564","#05f9e2","#e2f705","#ff6f00"],
                    data: <?php echo $humeursStat ?>
                    }
                ]
                },
                options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Visualisation des humeurs'
                }
                }
            });
        </script>
        <?php
            } else if ($choixVisualisation == 'graphique') {
        ?>
            <div class="row">
                <form action="/?controller=visualisationhumeurs&action=afficherGraphique" method="POST"> 
                    <div class="col-5">
                        <input type="date" name="dateDebut" id="dateDebut" class="form-control">
                    </div>   
                    <div class="col-5">
                        <input type="date" name="dateFin" id="dateFin" class="form-control">
                    </div>
                    <div class="col-2">
                        <p class="espace0"></p>
                        <input type="submit" value="Valider" class="btn btn-success">
                    </div>
                </form>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
