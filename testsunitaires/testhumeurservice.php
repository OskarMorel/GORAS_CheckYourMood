<?php
use model\connexionservice;
use model\humeurservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class HumeurServiceTest extends TestCase {

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
    public function testGetHumeursUtilisateurFiltres() {
        $pdo = $this->getPDO();
        
    }
    */

    //TODO savoir comment faire tests sur des arrays parce que marche pas
    /*
    public function testGetHumeursUtilisateurEmotions() {
        $pdo = $this->getPDO();
        
    }
    */

    //TODO savoir comment faire tests sur des arrays parce que marche pas
    /*
    public function testGetHumeursUtilisateur() {
        $pdo = $this->getPDO();
        
    }
    */

    public function testAjoutHumeur() {
        $pdo = $this->getPDO();
        //Test si une insertion ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::ajoutHumeur($pdo, "test", "2023-01-13 19:15:11", 72, 1));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::ajoutHumeur($pdo, "test", "2023-01-13 19:15:11", 71, 1));
    }

    public function testSuppHumeursUtilisateur() {
        $pdo = $this->getPDO();
        //Test si une suppression ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::suppHumeursUtilisateur($pdo, 72, 1, "2023-01-13 19:15:11"));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::suppHumeursUtilisateur($pdo, 72, 1, "2023-01-13 19:15:11"));
    }

    public function testSuppToutesHumeursutilisateur() {
        $pdo = $this->getPDO();
        //Test si la requete ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::suppToutesHumeursUtilisateur($pdo, 72));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::suppToutesHumeursUtilisateur($pdo, 72));
    }

}
?>