<?php
use PHPUnit\Framework\TestCase;



class EmotionsServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testNom() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testPrenom() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testMail() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testGenre() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testDateNaissance() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testMotDePasse() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

    public function testMdpCorrespond() {
        $pdo = $this->getPDO();
        //TODO faire des jeux de tests pour les vérification des champs du formulaire d'incription
    }

}
?>