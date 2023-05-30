<!DOCTYPE html>
<html>
<body>
	<h1>Maak Verkooporder aan</h1>

	<form action="insertVerkoopOrder.php" method="post">
		<input type="text" name="klantId" placeholder="klantId"required> *</br>
		<input type="text" name="artikelId" placeholder="artikelId" required> *</br>
		<input type="Date" name="Datum" placeholder="Date" required> *</br>
		<input type="text" name="Aantal" placeholder="aantal" required> *</br></br>
        <input type="text" name="Status" placeholder="status" required> *</br></br>
		<input type="submit" name="submit" value="Verkooporder toevoegen">
	</form>

	<a href="index.php">Terug naar de hoofdpagina</a>

	<?php 

	if(isset($_POST['submit'])){
		include "conn.php";
		include 'include/verkooporder.php';
		$conn = dbConnect();

		$klantId = $_POST['klantId'];
		$artikelId = $_POST['artikelId'];
		$Datum = $_POST['Datum'];
		$Aantal = $_POST['Aantal'];
		$Status = $_POST['Status'];

		$verkooporder = new VerkoopOrder();
		$verkooporder->insertVerkoopOrder($conn, $klantId, $artikelId, $Datum, $Aantal, $Status);
	}

	if(isset($verkooporder) && $verkooporder == true){
		echo '<script>alert("Verkooporder toegevoegd")</script>';
        echo "<script> location.replace('index.php'); </script>";
	} 

	?>
</body>
</html>