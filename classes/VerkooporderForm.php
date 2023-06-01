<?php
include "Database.php";
class VerkooporderForm
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }
    public function getKlanten() {
        $query = "SELECT * FROM klanten";
        $result = $this->db->executeQuery($query);
        return $this->db->fetchAll($result);
    }

    public function getArtikelen() {
        $query = "SELECT * FROM artikelen";
        $result = $this->db->executeQuery($query);
        return $this->db->fetchAll($result);
    }

    public function generateForm() {
        $klanten = $this->getKlanten();
        $artikelen = $this->getArtikelen();

        echo "<br><form action='insertVerkoop.php' method='POST'>";
        echo "<br><label for='klant'>Klant:</label><br>";
        echo "<br><select name='klant' id='klant'><br>";
        foreach ($klanten as $klant) {
            echo "<br><option value='{$klant['klantId']}'>{$klant['klantNaam']}</option><br>";
        }
        echo "<br></select>";

        echo "<br><label for='artikel'>Artikel:</label><br>";
        echo "<br><select name='artikel' id='artikel'><br>";
        foreach ($artikelen as $artikel) {
            echo "<option value='{$artikel['artId']}'>{$artikel['artOmschrijving']}</option><br>";
        }
        echo "<br></select>";

        echo "<br><label for='aantal'>Amount:</label><br>";
        echo "<br><input type='text' name='aantal' id='aantal'><br>";

        echo "<br><input type='submit' name='Submit' value='Submit''><br>";
        echo "</form>";
    }
}