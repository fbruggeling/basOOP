<?php 

class Klant{

	public function insertKlant($conn, $naam, $mail, $adres, $postcode, $woonplaats){

        $sql = "INSERT INTO klanten (klantNaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) VALUES ('$naam', '$mail', '$adres', '$postcode', '$woonplaats')";

		$stmt = $conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectKlant($conn){

		$sql = "SELECT * FROM `klanten`";

		$stmt = $conn->query($sql);

        $klant = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $klant;
        
	}

	public function getKlanten($conn){

		$sql = "SELECT DISTINCT klantNaam FROM klanten";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getKlant($conn, $klant){

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