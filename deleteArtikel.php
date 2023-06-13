<!DOCTYPE html>
<html>
<head>
    <title>deleten op Artikel ID</title>
</head>
<body>

<h2>deleten op Artikel ID</h2>
    <form method="POST" action="deleteArtikel.php">
        <input type="text" name="artId" placeholder="Voer Artikel ID in">
        <input type="submit" value="submit">
    </form>

<?php 

if(isset($_POST["submit"])){
	include 'classes/Artikel.php';
	

	$artikel = new Artikel;

	$artId = $_POST["artId"];
	

	$artikel->deleteArtikel($artId);
	echo '<script>alert("Artikel verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>

</body>
</html>