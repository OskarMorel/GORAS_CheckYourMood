<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <?php
        require 'includes/navbar.php';
        //var_dump($choixVisualisation);
        var_dump($humeurs);
        //var_dump($_SESSION);
        ?>
        <p class="espace1"></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
            <h5>Choisissez votre type de visualisation</h5>
            <p class="espace0"></p>
            <form action="/?controller=visualisationHumeurs&action=afficher" method="POST">

                <input name="choixVisualisation" value="tout" type="radio" class="btn-check" id="toutHumeurs" <?php if(isset($choixVisualisation)) {if($choixVisualisation == 'tout') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="toutHumeurs">Toutes les humeurs</label> 

                <input name="choixVisualisation" value="calendrier" type="radio" class="btn-check" id="calendrier" <?php if(isset($choixVisualisation)) {if($choixVisualisation == 'calendrier') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="calendrier">Calendrier des humeurs</label> 

                <input name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>" hidden>

                <input type="submit" value ="OK"class="btn btn-primary">
            </form>
            </div>
            <div class="col-1"></div>
        </div>
        <p class="espace2"></p>

        <?php 
            if($choixVisualisation == 'calendrier') {
        ?>
        
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'fr',
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        }
                });

                calendar.render();
                });

            </script>

            <div id='calendar'></div>

        <?php 
            } else if ($choixVisualisation == 'tout') {
        ?>

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
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>

        <?php 
            }
        ?>
        
</body>
</html>