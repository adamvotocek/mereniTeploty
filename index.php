<!DOCTYPE html>
<html>

<head>
<meta http-equiv="refresh" content="10">
<title>Adamova teplota</title>
<style>
    table { width: 50%; }
    table td { border: 1px solid gray; }
</style>
</head>

<body>
<h1>Výsledky měření teploty</h1>
<p>Naměřil jsem:</p>

<?php

$pocet = 5;
if($_GET["pocet"] !== "" && $_GET["pocet"] !== null)
    $pocet = $_GET["pocet"];


$servername = "localhost";
$username = "root";
$password = "hesloheslo";
$dbname = "popelnice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "SELECT id, teplota, zmereno FROM teplota";
$sql = "SELECT id, teplota, zmereno FROM teplota ORDER BY id DESC LIMIT " . $pocet;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

	echo "<table><tr><th>ID  </th><th>Teplota</th><th>Čas</th>";

    	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		
		echo "<td>" . $row["id"] . "</td>";
		echo "<td>" . $row["teplota"] . "</td>";
		echo "<td>" . $row["zmereno"] . "</td>";
        	
		echo "</tr>";
	}

	echo "</table>";
	
} else {
    echo "Žádné výsledky";
}

$conn->close();
?>



</body>
</html>