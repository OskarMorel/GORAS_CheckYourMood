<?php
use model\connexionservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class SelectTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testDates() {
        $pdo = $this->getPDO();
        $aTester = stathumeurservice::getDates($pdo, "2023-01-12", "2023-01-14", 71);
        $this->assertEquals('["2023-01-13","2023-01-13"]', $aTester);
    }

    public function testConnexion() {
        $pdo = $this->getPDO();
        $motDePasse = sha1("123");
        $aTester = connexionservice::motDePasseValide($pdo, "simon", $motDePasse);
        $this->assertNotTrue($aTester);
    }
}
?>