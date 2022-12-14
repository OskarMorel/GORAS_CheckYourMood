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
        $view->setVar('humeursStat', stathumeurservice::getNbEmotion($pdo, $codeUtilisateur));

        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
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

        $tableauDates = stathumeurservice::getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur);

        return $this->index($pdo);
    }

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function getHumeursByDate($pdo)
    {
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
        $codeEmotion = 1;
        
        $tableauHumeursByDate = stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, $codeEmotion, $codeUtilisateur);

        return $this->index($pdo);
    }

}

