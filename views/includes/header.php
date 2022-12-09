<!--
    * Header.php
    * @author Info2 IUT Rodez Orskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
    * @CheckYourMood 2022-2023
    * Header present sur toutes les pages de la partie de l'application.
    * Inclut les feuilles de style et la barre de navigation
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="author" content="">

    <meta charset="UTF-8">
    <!-- Icone de l'application -->
    <link rel="icon" href="../images/smiley.webp" />

    <!-- Liens vers les feuilles de styles (.css) -->
    <link href="../../pageStylesScripts/checkYourMood.css" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Liens vers les scripts (.js) -->
    <script src="https://kit.fontawesome.com/dbb1bac2bf.js"></script>
    <script src="../../bootstrap/js/boostrap.js"></script>
    <title>CheckYourMood</title>

</head>
<?php
    spl_autoload_extensions(".php");
    spl_autoload_register();

    // si session_start n'est pas déja lancée alors
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    ?>