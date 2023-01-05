<?php

namespace model;

class connexionservice
{

    //Faire un objet pdo pour chaque modele ?

    /**
     * Chercher si l'identifiant existe dans la bd
     * @return true si trouver sinon false
     */
    public static function identifiantExiste($pdo, $identifiant)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?");
            $stmt->execute([$identifiant]);
            $user = $stmt->fetch();
            if ($user == null) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
        
    }

    /**
     * Verifie que le MDP correspond a l'identifiant
     */
    public static function motDePasseValide($pdo, $identifiant, $motDePasse)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ? AND MOT_DE_PASSE = ?");
        $stmt->execute([$identifiant, sha1($motDePasse)]);
        $user = $stmt->fetch();
        if ($user == null) {
            return false;
        } else {
            return true;
        }
               
    }

    /**
     * Donne les infos de l'utilisateur sélectionné
     * retourne vrai si les informations ont pu être données sinon faux
     */
    public static function getUtilisateur($pdo, $identifiant)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?");
        $stmt->execute([$identifiant]);
        $user = $stmt->fetch();
        return $user;
    }


}
