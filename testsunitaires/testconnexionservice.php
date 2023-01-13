<?php
use model\connexionservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class ConnexionServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testVerifIdentifiant() {
        $pdo = $this->getPDO();
        $aTester1 = connexionservice::identifiantExiste($pdo, "simon");
        $aTester2 = connexionservice::identifiantExiste($pdo, "existePas");
        $this->assertTrue($aTester1);
        $this->assertNotTrue($aTester2);
    }

    public function testMotDePasse() {
        $pdo = $this->getPDO();
        $motDePasseValide = sha1("123");
        $aTester1 = connexionservice::motDePasseValide($pdo, "simon", $motDePasseValide);
        $this->assertNotTrue($aTester1);
    }

    //TODO voir comment vérifier deux arrays parce que là ça marche pas
    /*
    public function testGetUtilisateur() {
        $pdo = $this->getPDO();
        $aTester1 = connexionservice::getUtilisateur($pdo, "krxv");
        $this->assertEquals(["ID_UTILISATEUR"]=> int(71) ["NOM"]=> string(6) "Maurel" ["PRENOM"]=> string(5) "oskar" ["NOM_UTILISATEUR"]=> string(4) "krxv" ["MOT_DE_PASSE"]=> string(40) "c89ff64f286fdbecbecc612bee6be33a41fbadeb" ["MAIL"]=> string(20) "oskarmorel@gmail.com" ["GENRE"]=> string(5) "autre" ["DATE_DE_NAISSANCE"]=> string(10) "2002-07-05" }, $aTester1);
    }
    */

    //TODO faire pareil que au dessus
    /*
    public function testGetUtilisateurById() {

    }
    */
}
?>