<!DOCTYPE html>
<html>
<head>
    <title>deleten op klant ID</title>
</head>
<body>

<h2>deleten op klant ID</h2>
    <form method="POST" action="deleteKlant.php">
        <input type="text" name="klantId" placeholder="Voer klant ID in">
        <input type="submit" value="submit">
    </form>

<?php 

if(isset($_POST["submit"])){
	include 'classes/Klant.php';
	

	$klant = new Klant();

	$klantId = $_POST["klantId"];
	

	$klant->deleteKlant($klantId);
	echo '<script>alert("Klant verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>

</body>
</html>