<?php

namespace model;

class humeurservice
{

    /* Recupération des humeurs */
    public static function getHumeursUtilisateur($pdo, $codeUtilisateur)
    {
        $sql = "SELECT DATE_HEURE, DESCRIPTION, emotion.EMOJI, emotion.NOM, humeur.CODE_EMOTION
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
                'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION'], 'CODE_EMOTION' => $row['CODE_EMOTION']
            );
        }
        return $tabHumeurs;
    }

    /* Ajout d'une humeur */
    public static function ajoutHumeur($pdo, $description, $dateHeure, $codeUtilisateur, $codeEmotion)
    {

        $sql = "INSERT INTO `humeur` (`DESCRIPTION`, `DATE_HEURE`, `CODE_UTILISATEUR`, `CODE_EMOTION`) 
                VALUES (?, ?, ?, ?)";

        $pdo->beginTransaction();  

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$description, $dateHeure, $codeUtilisateur, $codeEmotion]);
            $_GET['humeursaisie'] = true;
            $pdo->commit();

        } catch (\PDOException $e) {
            $code = $e -> getCode();
            if ($code == 78945) {
                $_GET['dateHeureOK'] = false;
            } else {
                $e->getMessage();
                $_GET['exception'] = $e;
            }
            $pdo->rollBack();
        } catch (\Exception $e) {
            $_GET['exception'] = $e->getMessage();
        }
    }

    /* Suppression d'une humeur */
    public static function suppHumeursUtilisateur($pdo, $codeUtilisateur, $codeEmotion, $dateEmotion)
    {
        $pdo->beginTransaction(); 

        try {

            $stmt = $pdo->prepare("DELETE FROM humeur WHERE CODE_UTILISATEUR = ? AND CODE_EMOTION = ? AND DATE_HEURE = ?");

            $stmt->execute([$codeUtilisateur, $codeEmotion, $dateEmotion]);
            
        } catch (Exception $e) {
            $pdo->rollBack();
            $e -> getMessage();
        }
    }

    /* Suppression d'une humeur */
    public static function suppToutesHumeursUtilisateur($pdo, $codeUtilisateur)
    {
        try {

            $stmt = $pdo->prepare("DELETE FROM humeur WHERE CODE_UTILISATEUR = ?");

            $stmt->execute([$codeUtilisateur]);
            
        } catch (Exception $e) {
            $pdo->rollBack();
            $e -> getMessage();
        }
    }


    

    public static function intervalleHumeur() {
        
    }

}
