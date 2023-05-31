<?php

class Verkoop{

	public function insertVerkoop($conn, $klantId, $artId, $aantal){

		$datum = date("Y-m-d");

        $sql = "INSERT INTO verkooporders (klantId, artId, verkOrdDatum, verkOrdBestAantal, verkOrdStatus) VALUES ('$klantId', '$artId', '$datum', '$aantal', 1 )";

		$stmt = $conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectVerkoop($conn){

		$sql = "SELECT * FROM `verkooporders`";

		$stmt = $conn->query($sql);

        $verkoop = $stmt->fetchALL(PDO::FETCH_ASSOC);

        $this->printTable($verkoop);
        
	}

	public function printTable($verkoop){
		echo "<table border=1px>";
		echo "<tr>";
			echo "<th>VerkoopId</th>";
			echo "<th>KlantId</th>";
			echo "<th>ArtikelId</th>";
			echo "<th>VerkoopOrderDatum</th>";
			echo "<th>Aantal</th>";
			echo "<th>Status</th>";
		echo "</tr>";
		foreach($verkoop as $row){
			echo "<tr>";
				echo "<td>" . $row["verkOrdId"] . "</td>";
				echo "<td>" . $row["klantId"] . "</td>";
				echo "<td>" . $row["artId"] . "</td>";
				echo "<td>" . $row["verkOrdDatum"] . "</td>";
				echo "<td>" . $row["verkOrdBestAantal"] . "</td>";
				echo "<td>" . $row["verkOrdStatus"] . "</td>";
				echo "<td><form action='updateVerkoop.php' method='POST'><input type='hidden' name='verkoopId' value='$row[verkOrdId]'><input type='submit' name='bewerken' value='Bewerken'></form></td>";
				echo "<td><form action='selectVerkoop.php' method='POST'><input type='hidden' name='verkoopId' value='$row[verkOrdId]'><input type='submit' name='verwijderen' value='Verwijderen'></form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	public function getKlanten($conn){

		$sql = "SELECT DISTINCT klanten.klantNaam FROM klanten INNER JOIN verkooporders ON klanten.klantId = verkooporders.klantId";

		$stmt = $conn->query($sql);

        $klanten = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $klanten;
	}

	public function getKlant($conn, $data){

		$sql = "SELECT * FROM inkooporders WHERE $data =" ;

		$stmt = $conn->prepare($sql);

        $stmt->execute();
	}

	public function deleteVerkoop($nr, $conn){

		$sql = "DELETE FROM verkooporders WHERE verkOrdId = '$nr'";
		$stmt = $conn->prepare($sql);
        $stmt->execute();

        echo '<script>alert("Verkooporder verwijderd")</script>';

        echo "<script> location.replace('selectVerkoop.php'); </script>";
 	}

 	public function updateVerkoop($id, $klantid, $artId, $verkOrdDatum, $verkOrdStatus, $conn){

 		$sql = "UPDATE verkooporders SET Klantid = '$klantid', artId = '$artId', verkOrdDatum = '$verkOrdDatum', verkOrdStatus = '$verkOrdStatus' WHERE verkOrdId  = '$id'";

		$stmt = $conn->prepare($sql);

    	$stmt->execute();
 	}
}
?>