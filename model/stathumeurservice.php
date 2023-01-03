<?php

namespace model;

class stathumeurservice
{

    /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public static function getNbEmotion($pdo, $codeUtilisateur)
    {
        

        

        $stmt = $pdo->prepare("SELECT * FROM emotion");
        $stmt->execute();

        while ($rowStmt = $stmt->fetch()) {
            $recupNbHumeur = $pdo->prepare("SELECT SUM(:codeEmotion) FROM 'humeur' WHERE CODE_EMOTION = ':codeEmotion' AND CODE_UTILISATEUR = ':codeUtilisateur'");
            $recupNbHumeur->bindParam(':codeEmotion', $row['ID_EMOTION']);
            $recupNbHumeur->bindParam(':codeUtilisateur', $codeUtilisateur);
            $recupNbHumeur->execute();
            $row = $recupNbHumeur->fetch();

            $tabNbHumeurs[] = array(
                $row
            );
        }
        return $tabNbHumeurs;
    }


}
