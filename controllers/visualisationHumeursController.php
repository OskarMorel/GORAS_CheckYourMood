<?php

/**
 * visualisationHumeursController.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\verificationservice;

/**
 * Class de visualisationHumeursController
 * @package controllers
 */
class visualisationHumeursController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_visualisationHumeurs");

        $view->setVar('choixVisualisation', httphelper::getParam('choixVisualisation'));

        return $view;
    }  

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la éthode indexm
     */
    public function afficher($pdo)
    {
        return $this->index($pdo);
    }

}

