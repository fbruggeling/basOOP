<!DOCTYPE html>
<html>
<head>
    <title>Article inzien</title>
</head>
<body>
<?php
// maak connectie met de database
include "conn.php";

$conn = dbConnect();

// Zoek de gegeven op in tabel artikelen
$sql = "SELECT * FROM artikelen";
$stmt = $conn->query($sql);

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Naam</th><th>Inkoop</th><th>Verkoop</th><th>Voorraad</th><th>MinVoorraad</th><th>MaxVoorraad</th><th>Locatie</th><th>levId</th></th></tr>";

    // laat de data van elke row zien
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["artId"] . "</td>";
        echo "<td>" . $row["artOmschrijving"] . "</td>";
        echo "<td>" . $row["artInkoop"] . "</td>";
        echo "<td>" . $row["artVerkoop"] . "</td>";
        echo "<td>" . $row["artVoorraad"] . "</td>";
        echo "<td>" . $row["artMinVoorraad"] . "</td>";
        echo "<td>" . $row["artMaxVoorraad"] . "</td>";
        echo "<td>" . $row["artLocatie"] . "</td>";
        echo "<td>" . $row["levId"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Niks gevonden.";
}
?>
</body>
</html>
