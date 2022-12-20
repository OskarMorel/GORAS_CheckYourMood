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
use model\humeurservice;

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
        $view->setVar('humeurs', httphelper::getParam('humeurs'));


        return $view;
    }  

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la éthode index
     */
    public function afficher($pdo)
    {

        $codeUtilisateur = httphelper::getParam('codeUtilisateur');

        $_POST['humeurs'] = humeurservice::getHumeursUtilisateur($pdo, $codeUtilisateur);

        return $this->index($pdo);
    }

}

