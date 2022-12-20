<?php

namespace model;

class inscriptionservice
{

    /**
     * Ajoute un utlisateur a la base de donnée
     * @return true si trouver sinon false
     */
    public static function ajouterUtilisateur($pdo, $nom, $prenom, $mail, $nomUtilisateur, $genre, $dateNaissance, $motDePasse)
    {
        //Cryptage du mot de passe
        $mdp  = hash('sha1', htmlspecialchars($motDePasse));

        $sql ="INSERT INTO `utilisateur` (`NOM`, `PRENOM`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `MAIL`, `GENRE`, `DATE_DE_NAISSANCE`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $nomUtilisateur, $mdp, $mail,  $genre, $dateNaissance]);
        } catch (Exception $e) {
            $e->getMessage();
            $_GET['exception'] = $e;
        }
       


        // On affecte a une variable le nombre de création
        $data = $stmt->fetch();
        $data = $stmt->rowCount();
        
        if ($data == 1) {
            $_GET['creation'] = true;
            return true;
        } else {
            $_GET['creation'] = false;
            return false;
        }
    }

}
