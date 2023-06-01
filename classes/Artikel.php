<?php 

class Artikel{

	public function insertArtikel($conn, $naam, $inkoop, $verkoop, $voorraad, $minVoorraad, $maxVoorraad, $locatie, $levId){

        $sql = "INSERT INTO klanten (artOmschrijving, artInkoop, artVerkoop, arVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie, levId) VALUES ('$naam', '$inkoop', '$verkoop', '$voorraad', '$minVoorraad', '$maxVoorraad', '$levId')";

		$stmt = $conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectArtikel($conn){

		$sql = "SELECT * FROM `klanten`";

		$stmt = $conn->query($sql);

        $klant = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $klant;
        
	}

	public function getArtikelen($conn){

		$sql = "SELECT DISTINCT klantNaam FROM klanten";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getArtiekl($conn, $klant){

		$sql = "SELECT * FROM klanten WHERE klantnaam = '$klant'";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getIds($conn){

		$sql = "SELECT klantId FROM klanten";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getId($conn, $id){

		$sql = "SELECT * FROM klanten WHERE `klantId` = '$id'";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function deleteKlant($nr, $conn){

		try{
			$sql = "DELETE FROM `Klanten` WHERE `klantId` = '$nr'";
			$stmt = $conn->prepare($sql);
        	$stmt->execute();

        	echo '<script>alert("Klant verwijderd")</script>';

       	 	echo "<script> location.replace('selectKlant.php'); </script>";
   	 	} catch(Exception) {
   	 		echo '<script>alert("Er staat nog een verkooporder open onder deze klant")</script>';
   	 	}
 	}

}


?>