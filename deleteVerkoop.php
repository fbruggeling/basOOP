<!DOCTYPE html>
<html>
<head>
    <title>deleten op verkooporder ID</title>
</head>
<body>

<h2>deleten op Verkooporder ID</h2>
    <form method="POST" action="deleteVerkoop.php">
        <input type="text" name="verkOrdId" placeholder="Voer Verkooporder ID in">
        <input type="submit" value="submit">
    </form>

<?php 

if(isset($_POST["submit"])){
	include 'classes/Verkoop.php';
	

	$verkoop = new Verkoop();

	$verkOrdId = $_POST["verkOrdId"];
	

	$verkoop->deleteVerkoop($verkOrdId);
	echo '<script>alert("Verkooporder verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>

</body>
</html>