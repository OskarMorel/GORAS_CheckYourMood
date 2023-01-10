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
use model\stathumeurservice;

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
        $view = new view(config::getRacine() . "views/vue_visualisationhumeurs");

        $view->setVar('choixVisualisation', httphelper::getParam('choixVisualisation'));
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
        $view->setVar('humeursStat', stathumeurservice::getNbEmotion($pdo, $codeUtilisateur));
        $view->setVar('tableauDates', stathumeurservice::getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur));

        return $view;
    }  

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function afficher($pdo)
    {

        $codeUtilisateur = httphelper::getParam('codeUtilisateur');

        $humeursStat = stathumeurservice::getNbEmotion($pdo, $codeUtilisateur);

        return $this->index($pdo);
    }

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function getDates($pdo)
    {
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');

        var_dump($dateDebut);
        var_dump($dateFin);
        var_dump($codeUtilisateur);

        $tableauDates = stathumeurservice::getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur);

        return $this->index($pdo);
    }

}

