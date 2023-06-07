<?php 

include 'Database.php';

class Artikel extends Database{

	public function insertArtikel($conn, $naam, $inkoop, $verkoop, $voorraad, $minVoorraad, $maxVoorraad, $locatie, $levId){

        $sql = "INSERT INTO klanten (artOmschrijving, artInkoop, artVerkoop, arVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie, levId) VALUES ('$naam', '$inkoop', '$verkoop', '$voorraad', '$minVoorraad', '$maxVoorraad', '$levId')";

		$stmt = self::$conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectArtikel(){

		$lijst = self::$conn->query("select * from 	artikelen")->fetchAll();
		return $lijst;
        
	}

	public function getArtikelen(){

		$sql = "SELECT DISTINCT klantNaam FROM klanten";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getArtiekl($klant){

		$sql = "SELECT * FROM klanten WHERE klantnaam = '$klant'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getIds(){

		$sql = "SELECT klantId FROM klanten";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getId($id){

		$sql = "SELECT * FROM klanten WHERE `klantId` = '$id'";

		$stmt = self::$conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function deleteKlant($nr){

		try{
			$sql = "DELETE FROM `Klanten` WHERE `klantId` = '$nr'";
			$stmt = self::$conn->prepare($sql);
        	$stmt->execute();

        	echo '<script>alert("Klant verwijderd")</script>';

       	 	echo "<script> location.replace('selectKlant.php'); </script>";
   	 	} catch(Exception) {
   	 		echo '<script>alert("Er staat nog een verkooporder open onder deze klant")</script>';
   	 	}
 	}

	public function showTable($lijst){
		
		
		echo "<table>";
		echo "<tr><th>ID</th><th>Naam</th><th>Inkoop</th><th>Verkoop</th><th>Voorraad</th><th>MinVoorraad</th><th>MaxVoorraad</th><th>Locatie</th><th>levId</th></th></tr>";
		foreach($lijst as $row) {
			
			
			echo "<tr>";
			echo "<td>" . $row["artId"] . "</td>";
			echo "<td>" . $row["artOmschrijving"] . "</td>";
			echo "<td>" . $row["artInkoop"] . "</td>";
			echo "<td>" . $row["artVerkoop"] . "</td>";
			echo "<td>" . $row["artVoorraad"] . "</td>";
			echo "<td>" . $row["artMinVoorraad"] . "</td>";
			echo "<td>" . $row["artMaxVoorraad"] . "</td>";
			echo "<td>" . $row["artLocatie"] . "</td>";
			echo "<td>" . $row["levId"] . "</td>";
			echo "</tr>";
			
		
			
		}
		echo "</table>";
	}

}
?>