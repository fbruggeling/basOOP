<?php 

class VerkoopOrder{

	public function insertVerkoopOrder($conn, $klantId, $artikelId, $Datum, $Aantal, $Status){

        $sql = "INSERT INTO verkooporders (klantId, artId, verkOrdDatum, verkOrdBestAantal, verkordStatus) VALUES ('$klantId', '$artikelId', '$Datum', '$Aantal', '$Status')";

		$stmt = $conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function selectVerkoopOrder($conn){

		$sql = "SELECT * FROM `verkooporders`";

		$stmt = $conn->query($sql);

        $verkooporder = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $verkooporder;
        
	}

	public function getVerkoopOrders($conn){

		$sql = "SELECT DISTINCT klantid FROM verkooporders";

		$stmt = $conn->query($sql);

        $verkooporders = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $verkooporders;
	}

	public function getVerkoopOrder($conn, $klantId){

		$sql = "SELECT * FROM verkooporders WHERE klantId = '$klantId'";

		$stmt = $conn->query($sql);

        $verkooporders = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $verkooporders;
	}

	public function getIds($conn){

		$sql = "SELECT verkOrdId FROM verkooporders";

		$stmt = $conn->query($sql);

        $verkooporders = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $verkooporders;
	}

	public function getId($conn, $id){

		$sql = "SELECT * FROM verkooporders WHERE `verkOrdId` = '$id'";

		$stmt = $conn->query($sql);

        $verkooporders = $stmt->fetchALL(PDO::FETCH_ASSOC);

   	   return $verkooporders;
	}

	public function deleteVerkooporder($nr, $conn){

		try{
			$sql = "DELETE FROM `verkooporders` WHERE `verkOrdId` = '$nr'";
			$stmt = $conn->prepare($sql);
        	$stmt->execute();

        	echo '<script>alert("verkooporder verwijderd")</script>';

       	 	echo "<script> location.replace('selectVerkooporder.php'); </script>";
   	 	} catch(Exception) {
   	 		return false;
   	 	}
 	}

}


?>