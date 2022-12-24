<?php

/**
 * profilController.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;
use model\humeurservice;
use model\utilisateurservice;

/**
 * Class profilController
 * 
 * @package controllers
 */
class profilController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "/views/vue_profil");
        $view->setVar('RACINE', config::getRacine());

        return $view;
    }

    /**
     * Modifie le profil de l'utilisateur
     */
    public function modifierProfil($pdo)
    {
        //TODO gerer les sessions
        return $this->index($pdo);
    }

    /**
     * Supprime le profil de l'utilisateur le deinscrit de l'application
     */
    public function supprimerProfil($pdo)
    {
        //On recupere le code utilisateur
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');

        //Suppression de toutes les humeurs de l'utilisateur
        humeurservice::suppHumeursUtilisateur($pdo, $codeUtilisateur);

        //Suppression de l'utilisateur
        utilisateurservice::suppUtilisateur($pdo, $codeUtilisateur);

        sleep(5);
        header("Location: /?controller=index");
        exit();
    }
}
