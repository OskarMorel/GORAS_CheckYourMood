<?php

namespace model;
use DateTime;

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

     /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public static function getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur)
    {
        $stmt = $pdo->prepare("SELECT DISTINCT DATE_HEURE FROM humeur WHERE DATE_HEURE BETWEEN :dateDebut AND :dateFin AND CODE_UTILISATEUR = :codeUtilisateur ORDER BY DATE_HEURE");
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':codeUtilisateur', $codeUtilisateur);
        $stmt->execute();
        
        $tabDates[] = array();
        $texteFinal = "[";

        while ($rowStmt = $stmt->fetch()) {
            $tabDates[] = substr(json_encode(array_values($rowStmt)), 0, -11)."\"";
        }
        unset($tabDates[0]);
        $texte = implode(',',$tabDates);
        $texteSansCrochets = str_replace(["[", "]"], "",$texte);
        $texteFinal = $texteFinal.$texteSansCrochets."]";
        return $texteFinal;
    }

    /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public static function getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, $codeEmotion, $codeUtilisateur)
    {

        $stmt = $pdo->prepare("SELECT DISTINCT DATE_HEURE FROM humeur WHERE DATE_HEURE BETWEEN :dateDebut AND :dateFin AND CODE_UTILISATEUR = :codeUtilisateur ORDER BY DATE_HEURE");
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':codeUtilisateur', $codeUtilisateur);
        $stmt->execute();
        
        $tabDates[] = array();
        $tabNbHumeurs[] = array();

        while ($rowStmt = $stmt->fetch()) {
            $date = new DateTime($rowStmt);
            $date->format('Y-m-d');
            $tabDates[] = $date;
        }
        var_dump($tabDates);

        $texteFinal = "[";
        for ($i = 0; $i < count($tabDates); $i++) {
            $recupNbHumeur = $pdo->prepare("SELECT COUNT(CODE_EMOTION) FROM humeur WHERE CODE_EMOTION = :codeEmotion AND CODE_UTILISATEUR = :codeUtilisateur AND DATE_HEURE LIKE :dateHumeur");
            $recupNbHumeur->bindParam(':codeEmotion', $codeEmotion);
            $recupNbHumeur->bindParam(':codeUtilisateur', $codeUtilisateur);
            $recupNbHumeur->bindParam(':dateHumeur', $tabDates[$i]);
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
