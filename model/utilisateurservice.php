<?php

namespace model;

class utilisateurservice
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
            $_GET['creation'] = true;
        } catch (\Exception $e) {
            $_GET['creation'] = false;
            $e->getMessage();
            $_GET['exception'] = $e;
            var_dump($e->getMessage());
            exit();
            
        }
       
    }

    /* Supprimer un utilisateur */
    public static function suppUtilisateur($pdo, $codeUtilisateur)
    {
        $sql = "DELETE FROM `utilisateur` WHERE ID_UTILISATEUR = ?";

        try {

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur]);
            
        } catch (\Exception $e) {
            $pdo->rollBack();
            $e -> getMessage();
            var_dump($e->getMessage());
            exit();
        }
    }

}
