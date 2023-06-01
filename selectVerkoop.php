<?php

include "conn.php";
include "classes/verkoop.php";

$conn = dbConnect();
$verkoop = new Verkoop();
$table = $verkoop->selectVerkoop($conn);

if(!empty($_POST['verwijderen'])){
	$verkoop->updateVerkoop($_POST['verkoopId'], $conn);
}


echo "<a href='index.php'>Home</a>";

?>