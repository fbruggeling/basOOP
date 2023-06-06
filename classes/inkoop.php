<?php 

class Inkoop{

	public function insertInkoop($conn, $levId, $artId, $aantal){

		$datum = date("Y-m-d");

        $sql = "INSERT INTO inkooporders (levId, artId, inkOrdDatum, inkOrdBestAantal, inkOrdStatus) VALUES ('$levId', '$artId', '$datum', '$aantal', 1 )";

		$stmt = $conn->prepare($sql);

        $stmt->execute();

        return true;

	}

	public function inkoopSelect($data, $subject){

	?><select name="<?=$data?>" required><?php
		foreach($subject as $subject){
			foreach ($subject as $row){ ?>
	   	<option><?=$row?></option>
		<?php }}?>
	</select></br><?php
	

	}

	public function deleteInkoop($conn, $data){

		$sql = "DELETE * FROM inkooporders WHERE inkOrdId = '$data'";

		$stmt = $conn->prepare($sql);

        $stmt->execute();
	}


}
?>