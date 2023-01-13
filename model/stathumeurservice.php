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
        $stmt = $pdo->prepare("SELECT DISTINCT DATE_FORMAT(DATE_HEURE, '%Y-%m-%d') FROM humeur WHERE DATE_HEURE BETWEEN :dateDebut AND :dateFin AND CODE_UTILISATEUR = :codeUtilisateur ORDER BY DATE_FORMAT(DATE_HEURE, '%Y-%m-%d')");
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':codeUtilisateur', $codeUtilisateur);
        $stmt->execute();
        
        $tabDates[] = array();
        $texteFinal = "[";

        while ($rowStmt = $stmt->fetch()) {
            $tabDates[] = json_encode(array_values($rowStmt));
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

        $stmt = $pdo->prepare("SELECT DISTINCT DATE_FORMAT(DATE_HEURE, '%Y-%m-%d') FROM humeur WHERE DATE_HEURE BETWEEN :dateDebut AND :dateFin AND CODE_UTILISATEUR = :codeUtilisateur ORDER BY DATE_FORMAT(DATE_HEURE, '%Y-%m-%d')");
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':codeUtilisateur', $codeUtilisateur);
        $stmt->execute();
        
        $tabDates[] = array();
        $tabNbHumeurs[] = array();

        while ($rowStmt = $stmt->fetch()) {
            $tabDates[] = json_encode(array_values($rowStmt));
        }
        unset($tabDates[0]);


        $texteFinal = "[";
        $somme = 0;
        for ($i = 1; $i <= count($tabDates); $i++) {
            $recupNbHumeur = $pdo->prepare("SELECT COUNT(CODE_EMOTION) FROM humeur WHERE CODE_EMOTION = :codeEmotion AND CODE_UTILISATEUR = :codeUtilisateur AND DATE_FORMAT(DATE_HEURE, '%Y-%m-%d') LIKE :dateHumeur");
            $recupNbHumeur->bindParam(':codeEmotion', $codeEmotion);
            $recupNbHumeur->bindParam(':codeUtilisateur', $codeUtilisateur);
            $humeurIndice = str_replace(["[", "]", "\""], "",$tabDates[$i]);
            $recupNbHumeur->bindParam(':dateHumeur', $humeurIndice);
            $recupNbHumeur->execute(); 
            $row = $recupNbHumeur->fetch();
            $valSansCrochet = str_replace(["[", "]"], "", json_encode(array_values($row)));
            $somme += intval($valSansCrochet);
            $tabNbHumeurs[] = $somme;
        }
            
        unset($tabNbHumeurs[0]);
        $texte = implode(',',$tabNbHumeurs);
        $texteSansCrochets = str_replace(["[", "]"], "",$texte);
        $texteFinal = $texteFinal.$texteSansCrochets."]";
        return $texteFinal;
    }


}
