<!DOCTYPE html>
<html>
<body>
	<h1>Voeg verkoop order toe</h1>

	<form action="insertVerkoop.php" method="post">
		<input type="text" name="klantId" placeholder="Klant ID" required> *</br>
		<input type="text" name="artId" placeholder="Artikel ID"required> *</br>
		<input type="text" name="verkOrdBestAantal" placeholder="Aantal" required> *</br>
		<input type="submit" name="submit" value="Verkoop order toevoegen">
	</form>

	<h1>Voeg producten aan verkooporder toe</h1>

	<form action="insertVerkoop.php" method="post">
		<input type="text" name="klantId" placeholder="Klant ID" required> *</br>
		<input type="text" name="artId" placeholder="Artikel ID"required> *</br>
		<input type="text" name="verkOrdBestAantal" placeholder="Aantal" required> *</br>
		<input type="submit" name="artikel" value="Product toevoegen">
	</form>

	<a href="index.php">Terug naar de hoofdpagina</a>

	<?php 

	if(isset($_POST['submit'])){
		include "conn.php";
		include 'include/verkoop.php';
		$conn = dbConnect();


		$klantId = $_POST['klantId'];
		$artId = $_POST['artId'];
		$aantal = $_POST['verkOrdBestAantal'];

		$verkoop = new Verkoop();
		$verkoop->insertVerkoop($conn, $klantId, $artId, $aantal);
	}

	if(isset($_POST['artikel'])){
		include "conn.php";
		include 'include/verkoop.php';
		$conn = dbConnect();


		$klantId = $_POST['klantId'];
		$artId = $_POST['artId'];
		$aantal = $_POST['verkOrdBestAantal'];

		$verkoop = new Verkoop();
		$verkoop->insertVerkoop($conn, $klantId, $artId, $aantal);
	}

	if(isset($verkoop) && $verkoop == true){
		echo '<script>alert("Klant toegevoegd")</script>';
        echo "<script> location.replace('index.php'); </script>";
	} 

	?>
</body>
</html>