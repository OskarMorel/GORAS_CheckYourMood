<?php
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class StatHumeurServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    //TODO régler soucis. L'appel de la méthode dans le service renvoie deux fois chaques valeurs obtenues c'est bizarre
    public function testAfficher() {
        $pdo = $this->getPDO();
        $aTester1 = stathumeurservice::getNbEmotion($pdo, 70);
        $resultatAttendu = "[51,48,36,40,53,41,30,24,38,42,39,42,42,33,44,37,46,46,44,29,35,37,42,41,50,0,0]";
        $resultatNonAttendu = "Test pas egal";
        $this->assertEquals($resultatAttendu, $aTester1);
        $this->assertNotEquals($resultatNonAttendu, $aTester1);
    }

    //TODO régler soucis. L'appel de la méthode dans le service renvoie deux fois chaques valeurs obtenues c'est bizarre
    public function testGetDates() {
        $pdo = $this->getPDO();
        
        $aTester1 = stathumeurservice::getDates($pdo, "2023-01-01", "2023-01-11", 70);
        $resultatAttendu = '["2023-01-01","2023-01-10"]';

        $resultatNonAttendu = "test pas egal";

        $this->assertEquals($resultatAttendu, $aTester1);
        $this->assertNotEquals($resultatNonAttendu, $aTester1);
    }

    //TODO à gérer, y a aussi une erreur sauf que là ça renvoie 0,0 alors que c'est sensé renvoyé 1,9 j'ai vérifié avec des var_dump
    public function testGetNbHumeursParEmotions() {
        $pdo = $this->getPDO();

        $this->assertEquals('[1,9]', stathumeurservice::getNbHumeursParEmotions($pdo, "2023-01-01", "2023-01-11", 1, 70)); 
    }
}
?>