<?php

/**
 * connexioncontroller.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\connexionservice;
use model\afficher;

/**
 * Class connexioncontroller
 * Page d'accueil de la partie visible
 * @package controllers
 */
class connexionController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/index");
        $view->setVar('RACINE', config::getRacine());
        return $view;
    }

    /**
     * Tentative de connexion
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function connection($pdo)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $err = "";
        $connect = false;

        if (httphelper::getParam('identifiant') != null && httphelper::getParam('motDePasse') != null) {
            
            $identifiant = httphelper::getParam('identifiant');
            $motDePasse = httphelper::getParam('motDePasse');

            $connect = true;
            /*
            if (connexionservice::identifiantExiste($pdo, $identifiant)) {
                if(connexionservice::identifiantMotDePasseValide($pdo, $identifiant, $motDePasse)) {

                }
            }*/
            

        } else {
            $err = 'vide';
        }

        /*
        // test valeur
        if (httphelper::getParam('identifiant') != null && httphelper::getParam('motDePasse') != null) {
            $identifiant = httphelper::getParam('identifiant');
            $mdp = httphelper::getParam('motDePasse');

            if (connection::identifiantValide($pdo, $identifiant)) {
                if (connection::motDePasseValide($pdo, $identifiant, $mdp)) {
                    $connect = true;
                } else {
                    $err = "identifiantmdp";
                }
            } else {
                $err = "identifiantmdp";
            }
        } else {
            $err = 'vide';
        }
*/
        if ($connect) {
            
            //TODO faire la mise en place des sessions et appeler la methode getUtilisateur 
            header("Location: /?controller=accueil");
        }

        $_GET['err'] = $err;

        return $this->index($pdo);
    }
}
