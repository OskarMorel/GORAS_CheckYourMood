<?php

/**
 * formhelpers.php
 * @CheckYourMood 2022-2023
 */

namespace yasmf;

use services\usersservices;

/**
 * Méthodes utilitaires pour la gestion des formulaires
 * @package yasmf
 */
class formhelpers
{

    /**
     * Vérifie une adresse mail
     * @param $email adresse email à vérifier
     * @return bool true si valide, false sinon
     */
    public static function check_email_addressSTUB($email)
    {
        if (@!preg_match("^[^@]{1,64}@[^@]{1,255}$", $email)) {
            return false;
        }
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (@!preg_match("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
                return false;
            }
        }
        if (@!preg_match("^\[?[0-9\.]+\]?$", $email_array[1])) {
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false;
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (@!preg_match("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                    return false;
                }
            }
        }
        return true;
    }


    // STUB TODO modifier fonction check_email_addressSTUB et la remettre en route (enlever le STUB)
    public static function check_email_address($email)
    {
        return true;
    }


    /**
     * Génère aléatoirement un mot de passe
     * @param $nbCar nombre de carractère du mot de passe à générer
     * @return string chaine contenant le mot de passe généré
     */
    public static function generate_password($nbCar)
    {
        $carPossibles = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
        $nbCarPossibles = strlen($carPossibles) - 1;
        $pass = "";
        for ($i = 0; $i < $nbCar; $i++) {
            $pos = mt_rand(0, $nbCarPossibles);
            $pass .= $carPossibles[$pos];
        }
        return $pass;
    }


    /**
     * Teste si les informations d'un utilisateur sont valides ou pas
     * @param $prenom prénom
     * @param $nom nom
     * @param $pseudo pseudo
     * @param $email email
     * @return bool true si informations valides, false sinon
     */
    public static function testUser($prenom, $nom, $pseudo, $email)
    {
        // Indicateur de validité
        $ok = true;

        // Teste si champs vide
        if (!$prenom || !$nom || !$pseudo || !$email) {
            $ok = false;
        }

        // Teste longueur pseudo (au moins 3 carractères) et nom prenom (au moins 2 carractères)
        if ((strlen($prenom) < 2) || (strlen($nom) < 2) || (strlen($pseudo) < 3)) {
            $ok = false;
        }

        // TODO Ajouter test si pseudo ou email existe déjà dans la BDD

        // Teste Email
        $ok = ($ok && filter_var($email, FILTER_VALIDATE_EMAIL));

        return $ok;
    }


    /**
     * Véréifie la validité d'un prénom
     * @param $prenom à vérifier
     * @return bool true si valide, false sinon
     */
    public static function chkPrenom($prenom)
    {
        if (strlen($prenom) < 2) {
            return false;
        }
        return true;
    }


    /**
     * Véréifie la validité d'un nom
     * @param $nom à vérifier
     * @return bool true si valide, false sinon
     */
    public static function chkNom($nom)
    {
        if (strlen($nom) < 2) {
            return false;
        }
        return true;
    }


    /**
     * Véréifie la validité d'un pseudo
     * @param $pseudo à vérifier
     * @return bool true si valide, false sinon
     */
    public static function chkPseudo($pseudo)
    {
        if (strlen($pseudo) < 3) {
            return false;
        }
        return true;
    }


    /**
     * Vérifie le  bon fonctionnement d'un mot de passe
     * @param $npassword premier mot de passe à vérifier
     * @param $rnpassword secont mot de passe à vérifier
     * @return string|null true si mots de passes correspondent et valides, false sinon
     */
    public static function chkNPassword($npassword, $rnpassword)
    {
        if ($npassword != $rnpassword) {
            return "Les mots de passe ne correspondent pas.";
        }
        if (strlen($npassword) < 8) {
            return "Votre nouveau mot de passe doit faire au moins 8 carractères";
        }
        return null;
    }
}
