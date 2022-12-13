<?php

/**
 * indexController.php
 */


namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;

/**
 * Class indexController
 * Page de connexion a l'application
 * @package controllers
 */
class indexController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "/views/index");
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
