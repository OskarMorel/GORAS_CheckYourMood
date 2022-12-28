<?php

namespace model;

class stathumeurservice
{

    /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public static function getNbEmotion($pdo, $codeUtilisateur, $codeEmotion)
    {
        $stmt = $pdo->prepare("SELECT SUM(:codeEmotion) FROM 'humeur' WHERE CODE_EMOTION = ':codeEmotion' AND CODE_UTILISATEUR = ':codeUtilisateur'");
        $stmt->bindParam(':codeEmotion', $codeEmotion);
        $tmt->bindParam(':codeUtilisateur', $codeUtilisateur);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row;
    }


}
