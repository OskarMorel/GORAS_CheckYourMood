<?php

/**
 * consulterHumeursController.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\verificationservice;
use model\humeurservice;

/**
 * Class de consulterHumeursController
 * @package controllers
 */
class consultationHumeursController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_consultationhumeur");
        $view->setVar('choixConsultation', httphelper::getParam('choixConsultation'));
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $_POST['humeurs'] = humeurservice::getHumeursUtilisateur($pdo, $codeUtilisateur);
        $view->setVar('humeurs', httphelper::getParam('humeurs'));

        return $view;
    }  

    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function consulter($pdo)
    {

        return $this->index($pdo);
    }  

    /**
     * Suppression d'une humeur d'un utilisateur
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function supprimer($pdo)
    {
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $codeEmotion = httphelper::getParam('codeEmotionASuppr');
        $dateEmotion = httphelper::getParam('dateEmo');

        humeurservice::suppHumeursUtilisateur($pdo, $codeUtilisateur, $codeEmotion, $dateEmotion);

        return $this->index($pdo);
    }

}

