<?php

namespace model;

class humeurservice
{

    /**
     * Renvoie TODO peut etre renovyer des valeurs ?
     *
     */
    public static function intervalleValide()
    {
        return true;
    }

    /* Recupération des humeurs */
    public static function getHumeursUtilisateur($pdo, $codeUtilisateur)
    {
        $sql = "SELECT DATE_HEURE, DESCRIPTION, emotion.EMOJI, emotion.NOM
                FROM `humeur`
                JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                WHERE humeur.CODE_UTILISATEUR = ?
                ORDER BY `DATE_HEURE` DESC
                ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$codeUtilisateur]);

        $tabHumeurs = array();
        while ($row = $stmt->fetch()) {
            $tabHumeurs[] = array(
                'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION']
            );
        }
        return $tabHumeurs;
    }

    /* Ajout d'une humeur */
    public static function ajoutHumeur($pdo, $description, $dateHeure, $codeUtilisateur, $codeEmotion)
    {

        $sql = "INSERT INTO `humeur` (`DESCRIPTION`, `DATE_HEURE`, `FICHIER`, `CODE_UTILISATEUR`, `CODE_EMOTION`) 
                VALUES (?, ?, NULL, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$description, $dateHeure, $codeUtilisateur, $codeEmotion]);

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
