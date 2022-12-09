<?php

/**
 * erreur404Controller.php
 * @author Equipe 6 | Gauthier Guirola-Boe , Simon Launay , Tatiana Borgi , Gabriel Benniks-Chabbert
 * @SyndicSaas 2021-2022
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;

/**
 * Class homecontroller
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
        $view = new view(config::getRacine() . "views/visible/PageErreur");
        $view->setVar('RACINE', config::getRacine());

        $err = httphelper::getParam('err');
        $view->setVar('err', $err);

        return $view;
    }
}
