<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br />";

mysqli_select_db($conn, $database);

echo "Datenbank ausgewählt!<br />";

$sql = "SELECT * FROM customers  WHERE job_title = 'Purchasing Representative'";
$result = $conn->query($sql);

if ($dbType === 'mysql') {
    while ($record = mysqli_fetch_assoc($result)) {
        d($record);
    }
}

if ($result->num_rows > 0) {
    echo $result->num_rows . " Resultate<br />";
} else {
    echo "Keine Resultate vorhanden";
}

mysqli_close($conn);

//Dump function
function d($args) {
    echo "<pre>";
    var_dump($args);
    echo "</pre>";
}
