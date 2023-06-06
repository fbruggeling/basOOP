<?php

include "conn.php";
include "classes/klant.php";

$conn = dbConnect();
$klant = new Klant();
$tabel = $klant->selectKlant($conn);
$klanten = $klant->getKlanten($conn);
$ids = $klant->getIds($conn);?>

<h2>Zoeken op klantnaam</h2>

<form action="selectKlant.php" method="post">
	<select name="klant" required>
	<?php foreach ($klanten as $klanten){
		foreach ($klanten as $row){ ?>
	    <option><?=$row?></option>
	<?php }} ?>
	</select></br></br>
	<input type="submit" name="klantsubmit" value="Zoeken">
</form><?php

if(!empty($_POST['klantsubmit'])){
	$search = $klant->getKlant($conn, $_POST['klant']);
	printTable($search);
}?>

<hr>
<h2>Zoeken op klantid</h2>

<form action="selectKlant.php" method="post">
	<select name="id" required>
	<?php foreach ($ids as $klanten){
		foreach ($klanten as $row){ ?>
	    <option><?=$row?></option>
	<?php }} ?>
	</select></br></br>
	<input type="submit" name="idsubmit" value="Zoeken">
</form>

<?php

if(!empty($_POST['idsubmit'])){
	$search = $klant->getId($conn, $_POST['id']);
	printTable($search);
}

echo "<hr><h2>Alle klanten</h2>";
printTable($tabel);


if(!empty($_POST['verwijderen'])){
	$klant->deleteKlant($_POST['klantId'], $conn);
}

function printTable($klant){
	echo "<table border=1px>";
		foreach($klant as $row){
			echo "<tr>";
				echo "<td>" . $row["klantId"] . "</td>";
				echo "<td>" . $row["klantNaam"] . "</td>";
				echo "<td>" . $row["klantEmail"] . "</td>";
				echo "<td>" . $row["klantAdres"] . "</td>";
				echo "<td>" . $row["klantPostcode"] . "</td>";
				echo "<td>" . $row["klantWoonplaats"] . "</td>";
				echo "<td><form action='selectKlant.php' method='POST'><input type='hidden' name='klantId' value='$row[klantId]'><input type='submit' name='verwijderen' value='Verwijderen'></form></td>";
				echo "<td><form action='updateKlant.php' method='POST'><input type='hidden' name='klantId' value='$row[klantId]'><input type='submit' name='Bewerken' value='Bewerken'></form></td>";
			echo "</tr>";
		}
	echo "</table>";
}

echo "</br><a href='index.php'>Home</a>";

?>