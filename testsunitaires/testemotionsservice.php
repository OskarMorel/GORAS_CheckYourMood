<?php
use model\connexionservice;
use model\stathumeurservice;
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

    //TODO savoir comment faire tests sur des arrays parce que marche pas
    /*
    public function testGetEmotions() {
        $pdo = $this->getPDO();
        
    }
    */
}
?>