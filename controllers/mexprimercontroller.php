<?php

/**
 * mexprimercontroller.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\emotionsservice;
use model\humeurservice;

/**
 * Class connexioncontroller
 * Page d'accueil de la partie visible
 * @package controllers
 */
class mexprimerController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_saisirHumeur");

        $view->setVar('tabEmotions', emotionsservice::getEmotions($pdo));
        $view->setVar('intervalleValide', null);

        $view->setVar('description', httphelper::getParam('newDescription'));
        $view->setVar('heure', httphelper::getParam('newHeure'));
        $view->setVar('date', httphelper::getParam('newDate'));
        $view->setVar('codeEmotion', httphelper::getParam('newCodeEmotion'));
        $view->setVar('codeUtilisateur', httphelper::getParam('newCodeUtilisateur'));

        $view->setVar('descriptionOK', httphelper::getParam('descriptionOK'));
        $view->setVar('dateHeureOK', httphelper::getParam('dateHeureOK'));
        //gerer date heure
        $view->setVar('codeUtilisateurOK', httphelper::getParam('codeUtilisateurOK'));
        $view->setVar('codeEmotionOK', httphelper::getParam('codeEmotionOK'));

        $view->setVar('creation', httphelper::getParam('creation'));
        
        return $view;
    }

    /**
     * Ajout de l'humeur
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function exprimer($pdo)
    {
        // Récupération variable
        $description = httphelper::getParam('newDescription');
        $dateHeure = httphelper::getParam('newDateHeure');
        $codeEmotion = httphelper::getParam('newCodeEmotion');
        $codeUtilisateur = httphelper::getParam('newCodeUtilisateur');


        //TODO verifier les variables

        //humeurservice::ajoutHumeur($pdo, $description, $dateHeure, $codeUtilisateur, $codeEmotion);

        return $this->index($pdo);
    }
}
