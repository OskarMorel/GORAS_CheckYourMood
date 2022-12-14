
<?php

/**
 * mexprimercontroller.php
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
        $view->setVar('RACINE', config::getRacine());
        return $view;
    }

    /**
     * Tentative de creation d'un utilisateur
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function exprimer($pdo)
    {

        if ($toutOK) {
            
            //TODO faire la mise en place des sessions et appeler la methode getUtilisateur 
            header("Location: /?controller=index");
        }

        $_GET['err'] = $err;

        return $this->index($pdo);
    }
}
