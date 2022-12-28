<?php
require 'includes/header.php';
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
            <div class="col-1"></div>
            <div class="col">
                <h5>Choisissez votre type de visualisation</h5>
                <form action="/?controller=visualisationHumeurs&action=afficher" method="POST">

                <input name="choixVisualisation" value="camembert" type="radio" class="btn-check" id="camembert" <?php if(isset($choixConsultation)) {if($choixConsultation == 'camembert') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="camembert">Camembert</label> 

                <input name="choixVisualisation" value="baton" type="radio" class="btn-check" id="baton" <?php if(isset($choixConsultation)) {if($choixConsultation == 'baton') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="baton">Diagramme en baton</label> 

                <input name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>" hidden>

                <input type="submit" value ="OK"class="btn btn-primary">
            </form>
            </div>
            <div class="col-1"></div>
        </div>
        <p class="espace1"></p>

        
        <?php 
            if($choixVisualisation == 'camembert') {
        ?>    
        <div class="row">

            <div class="col-2"></div>
            <div class="col">
                <canvas id="camembertChart" style="width:1000px;height:500px"></canvas>
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
                        data: [100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100]
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
            } 
        ?>
</body>
</html>