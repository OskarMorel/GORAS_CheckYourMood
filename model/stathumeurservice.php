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

        $tabNbHumeurs[] = array();
        $texteFinal = "[";

        while ($rowStmt = $stmt->fetch()) {
            $recupNbHumeur = $pdo->prepare("SELECT COUNT(CODE_EMOTION) FROM humeur WHERE CODE_EMOTION = :codeEmotion AND CODE_UTILISATEUR = :codeUtilisateur");
            $recupNbHumeur->bindParam(':codeEmotion', $rowStmt['ID_EMOTION']);
            $recupNbHumeur->bindParam(':codeUtilisateur', $codeUtilisateur);
            $recupNbHumeur->execute();
            $row = $recupNbHumeur->fetch();
            
            $tabNbHumeurs[] = json_encode(array_values($row));
        }
        unset($tabNbHumeurs[0]);
        $texte = implode(',',$tabNbHumeurs);
        $texteSansCrochets = str_replace(["[", "]"], "",$texte);
        $texteFinal = $texteFinal.$texteSansCrochets."]";   
        return $texteFinal;
    }


}
