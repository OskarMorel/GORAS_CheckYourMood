<?php

namespace model;

class emotionsservice
{

    /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public static function getEmotions($pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM emotion");
        $stmt->execute();

        $tabEmotions = array();
        while ($row = $stmt->fetch()) {
            $tabEmotions[] = array(
                'ID_EMOTION' => $row['ID_EMOTION'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM']
            );
        }
        return $tabEmotions;
    }
}
