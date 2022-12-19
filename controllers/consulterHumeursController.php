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

/**
 * Class de consulterHumeursController
 * @package controllers
 */
class consulterHumeursController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_consultationHumeur");

        return $view;
    }  

    /**
     * Tentative de creation d'un utilisateur
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function consulter($pdo)
    {

    }

}

