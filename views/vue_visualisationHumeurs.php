<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        var_dump($choixVisualisation);
        var_dump($_GET);
        ?>
        <p class="espace2"></p>
        <div class="row">
            <div class="col"></div>
            <div class="col">
            <h5>Choisissez votre type de visualisation</h5>
            <p class="espace0"></p>
            <form action="/?controller=visualisationHumeurs&action=afficher" method="POST">

                <input name="choixVisualisation" value="tout" type="radio" class="btn-check" id="toutHumeurs" <?php if(isset($choixVisualisation)) {if($choixVisualisation == 'tout') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="toutHumeurs">Toutes les humeurs</label> 

                <input name="choixVisualisation" value="calendrier" type="radio" class="btn-check" id="calendrier" <?php if(isset($choixVisualisation)) {if($choixVisualisation == 'calendrier') {echo('checked');}} ?>>
                <label class="btn btn-outline-secondary" for="calendrier">Calendrier des humeurs</label> 

                <input type="submit" value ="OK"class="btn btn-primary">
            </form>
            </div>
            <div class="col"></div>
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

        <?php 
            }
        ?>
        
</body>
</html>