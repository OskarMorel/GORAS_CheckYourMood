<?php

/**
 * connexioncontroller.php
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\connection;
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
        $view = new view(config::getRacine() . "views/vue_accueil");
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

        // test valeur
        if (httphelper::getParam('identifiant') != null && httphelper::getParam('motDePasse') != null) {
            $identifiant = httphelper::getParam('identifiant');
            $mdp = httphelper::getParam('motDePasse');

            if (connection::identifiantValide($pdo, $identifiant)) {
                if (connection::motDePasseValide($pdo, $identifiant, $mdp)) {
                    $connect = true;
                } else {
                    $err = "mdp";
                }
            } else {
                $err = "identifiant";
            }
        } else {
            $err = 'vide';
        }

        if ($connect) {
            $user = connection::getUtilisateur($pdo, $identifiant);
            if ($user != null) {

                $err = "valide";

                $_SESSION['user_id'] = $user['idUtilisateur'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];


                header("Location: /?mode=membre&controller=home");

            }
        }

        $_GET['err'] = $err;

        return $this->index($pdo);
    }
}
