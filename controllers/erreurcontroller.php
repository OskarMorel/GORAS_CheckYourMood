<?php

/**
 * erreur404Controller.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;

/**
 * Class erreurcontroller
 * Page d'accueil de la partie visible
 * @package controllers
 */
class erreurController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/pageerreur");

        $err = httphelper::getParam('err');
        $view->setVar('err', $err);
        
        return $view;
    }
}
