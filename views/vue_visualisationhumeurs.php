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
        //var_dump($humeursStat);
        //var_dump($tableauDates);
        if ($choixVisualisation == "") {
            $choixVisualisation = "graphique";
        }
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
            <div class="col"></div>
            <p class="espace0"></p>
            <div class="col"></div>   
            <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">

                <input hidden name="choixVisualisation" value="graphique" type="text" id="graphique">

                <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">

                <input type="submit" value="Graphique" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'graphique') {echo('-outline');}}?>-secondary">
            </form>
            <div class="col"></div>
        </div>
        <p class="espace0"></p>

        
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
                if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                    $dateDebut = $_POST['dateDebut'];
                    $dateFin = $_POST['dateFin'];
                }
        ?>

            <form action="/?controller=visualisationhumeurs&action=getDates" method="POST"> 
                <div class="row">
                    <div class="col"></div>
                    <div class="gauche col-2">
                        <label for="dateDebut">Entrez la date de début</label>
                        <input type="date" name="dateDebut" id="dateDebut" class="form-control" value="<?php if (isset($_POST['dateDebut'])) {echo $_POST['dateDebut']; }?>">
                    </div>
                    <div class="gauche col-2">
                        <label for="dateFin">Entrez la date de fin</label>
                        <input type="date" name="dateFin" id="dateFin" class="form-control" value="<?php if (isset($_POST['dateFin'])) {echo $_POST['dateFin'];}?>">   
                    </div>
                    <div class="col"></div>
                    <p class="espace0"></p>
                    <div class="col"></div>
                    <div class="col">
                        <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                        <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">
                        <input type="submit" value="Valider" class="btn btn-success">
                    </div>
                    <div class="col"></div>
                </div>
            </form>

            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <canvas id="lineChart" width="1000px" height="350px"></canvas>
                </div>
                <div class="col-2"></div>
            </div>
            <script>
                new Chart(document.getElementById("lineChart"), {
                    type: 'line',
                    data: {
                        labels: <?php echo $tableauDates; ?>,
                        datasets: [{ 
                            data: [86,114,106,106,107,111,133,221,783,2478],
                            label: "Admiration",
                            borderColor: "#d7a7ff",
                            fill: false
                        }, {
                            data: [282,350,411,502,635,809,947,1402,3700,5267],
                            label: "Adoration",
                            borderColor: "#8e5ea2",
                            fill: false
                        }, { 
                            data: [168,170,178,190,203,276,408,547,675,734],
                            label: "Apréciation esthétique",
                            borderColor: "#3cba9f",
                            fill: false
                        }, { 
                            data: [40,20,10,16,24,38,74,167,508,784],
                            label: "Amusement",
                            borderColor: "#e8c3b9",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Colère",
                            borderColor: "#c45850",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Anxiété",
                            borderColor: "#a48ce4",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Émerveillement",
                            borderColor: "#b6d7a8",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Malaise",
                            borderColor: "#8cace4",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Ennui",
                            borderColor: "#e48c8c",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Calme (sérénité)",
                            borderColor: "#f7df7c",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Confusion",
                            borderColor: "#2f90a8",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Envie",
                            borderColor: "#e32b2b",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Dégoût",
                            borderColor: "#351431",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Douleur empathique",
                            borderColor: "#eee7cf",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Intérêt étonné, intrigué",
                            borderColor: "#4b5e20",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Excitation (montée d'adrénaline)",
                            borderColor: "#c9b9ad",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Peur",
                            borderColor: "#8700ff",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Horreur",
                            borderColor: "#3e95cd",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Intérêt",
                            borderColor: "#f2cfb4",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Joie",
                            borderColor: "#fc7a08",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Nostalgie",
                            borderColor: "#000000",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Soulagement",
                            borderColor: "#98d400",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Romance",
                            borderColor: "#f50b86",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Tristesse",
                            borderColor: "#1d2564",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Satisfaction",
                            borderColor: "#05f9e2",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Désir sexuel",
                            borderColor: "#e2f705",
                            fill: false
                        }, { 
                            data: [6,3,2,2,7,26,82,172,312,433],
                            label: "Surprise",
                            borderColor: "#ff6f00",
                            fill: false
                        }
                        ]
                    },
                    options: {
                        title: {
                        display: true
                        }
                    }
                    });
            </script>
            
        <?php
            }
        ?>
    </div>
</body>
</html>
