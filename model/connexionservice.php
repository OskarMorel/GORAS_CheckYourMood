<?php

namespace model;

class connectionservice
{

    //Faire un objet pdo pour chaque modele ?

    /**
     * Chercher si l'identifiant existe dans la bd
     * @return true si trouver sinon false
     */
    public static function identifiantValide($pdo, $identifiant)
    {
        return true;
    }

    /**
     * Verifie que le MDP correspond a l'identifiant
     */
    public static function motDePasseValide($pdo, $identifiant, $motDePasse)
    {
        /*
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE identifiant = ? AND motDePasse = ?");
        $stmt->execute([$identifiant, sha1($password)]);
        $user = $stmt->fetch();
        if ($user == null) {
            return false;
        }
        */
        return true;
    }


    /**
     * Donne les infos de l'utilisateur sélectionné
     * retourne vrai si les informations ont pu être données sinon faux
     */
    public static function getUtilisateur($pdo, $identifiant)
    {

        return null;
    }


}
