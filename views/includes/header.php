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

    <?php session_start(); ?>

    <meta name="author" content="">

    <meta charset="UTF-8">
    <!-- Icone de l'application -->
    <link rel="icon" href="../images/smiley.png" />

    <!-- Liens vers les feuilles de styles (.css) -->
    <link href="../../pageStylesScripts/checkYourMood.css" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Liens vers les scripts (.js) -->
    <script src="https://kit.fontawesome.com/dbb1bac2bf.js"></script>
    <script src="../../bootstrap/js/boostrap.js"></script>

    <!-- Liens pour fullcalendar -->
    <script src='../../fullcalendar6/dist/index.global.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <title>CheckYourMood</title>

</head>