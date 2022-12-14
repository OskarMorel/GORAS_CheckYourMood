<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <!-- Barre de navigation -->
        <?php
        require 'includes/navbar.php';
        ?>
        <p class="espace2"></p>
        <div class="row">
            <h4>Une erreur est survenue</h4>
            <p><?php var_dump($err) ?></p>
        </div>
    </div>
</body>
</html>