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
    public static function getHumeurs($pdo)
    {
        $stmt = $pdo->prepare("SELECT DATE_HEURE, DESCRIPTION, emotion.EMOJI, emotion.NOM
                               FROM `humeur`
                               JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                               ORDER BY `DATE_HEURE` DESC");
        $stmt->execute();

        $tabHumeurs = array();
        while ($row = $stmt->fetch()) {
            $tabHumeurs[] = array(
                'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION']
            );
        }
        return $tabHumeurs;
    }

}
