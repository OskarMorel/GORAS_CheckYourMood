<?php

/**
 * accueilController.php
 */


namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;

/**
 * Class homeController
 * Page d'accueil de la partie visible
 * @package controllers
 */
class accueilController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_accueil");
        $view->setVar('RACINE', config::getRacine());

        return $view;
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function deconnexion($pdo)
    {
        //TODO gerer les sessions
        return $this->index($pdo);
    }
}
