<?php

namespace model;

class connection
{

    public $id;
    public $identifiant;
    public $motDePasse;
    public $nom;
    public $prenom;
    public $adresseMail;
    public $genre;
    public $dateNaissance;

    /**
     * Se connecte
     * retourne vrai si l'utilisateur est connecté
     */
    public function connection($pdo)
    {
        session_start();
        //TODO gerer les sessions
        if (!empty($_SESSION['Identifiant']) && !empty($_SESSION['MotDePasse']) && !$_SESSION['Status'] != 0) {
            $this->identifiant = $_SESSION['Identifiant'];
            $this->mdp = $_SESSION['MotDePasse'];
            $this->status = $_SESSION['Status'];

            return true;
        }
        return false;
    }


    /**
     * Se déconnecte
     * retourne vrai si la déconnection a pu se faire
     */
    public function deconnection($pdo)
    {
        session_start();                    // récupération de la session
        session_destroy();                  // destruction de la session
        header('Location: ../index.php');   // redirection vers la page d'accueil
        exit();
    }

    /**
     * Chercher si l'identifiant existe dans la bd
     * @return true si trouver sinon false
     */
    public static function identifiantValide($pdo, $identifiant)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur where identifiant = ?");
        $stmt->execute([$identifiant]);
        $pseudo = $stmt->fetch();
        if ($pseudo == null) {
            return false;
        }
        return true;
    }

    /**
     * Verifie que le MDP correspond a l'identifiant
     */
    public static function motDePasseValide($pdo, $identifiant, $motDePasse)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE identifiant = ? AND motDePasse = ?");
        $stmt->execute([$identifiant, sha1($password)]);
        $user = $stmt->fetch();
        if ($user == null) {
            return false;
        }
        return true;
    }


    /**
     * Donne les infos de l'utilisateur sélectionné
     * retourne vrai si les informations ont pu être données sinon faux
     */
    public static function getUtilisateur($pdo, $identifiant)
    {
        // permet de récupérer l'id de l'administrateur choisi précédemment
        if (!empty($identifiant)) {
            $_SESSION['user_id'] = $identifiant;
        } else {
            $identifiant = $_SESSION['user_id'];
        }

        // On récupère toute les informations de l'utilisateur grâce à son id
        $sql = 'SELECT *
                FROM utilisateur
                WHERE identifiant = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$identifiant]);

        // Le tableau renvoyé par le requête est mis dans user afin de récupérer les données de l'administrateur
        $user = $stmt->fetch();

        return $user;
    }


}
