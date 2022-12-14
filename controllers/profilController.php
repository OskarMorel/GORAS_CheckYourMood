<?php

/**
 * profilController.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;

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
}
