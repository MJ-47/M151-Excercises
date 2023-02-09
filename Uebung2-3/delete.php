<?php
//Dump function
function d($args)
{
    echo "<pre>";
    var_dump($args);
    echo "</pre>";
}

$dbType = "mysql";
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
    $conn = new PDO("$dbType:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
}

$statement = $conn->prepare("DELETE FROM order_details WHERE order_id = :id");
$statement->execute([
    'id' => $id
]);

$statement2 = $conn->prepare("DELETE FROM invoices WHERE order_id = :id");
$statement2->execute([
    'id' => $id
]);

// // $statement = $conn->prepare("DELETE FROM order_details WHERE order_id = :id");
// // $statement->execute([
// //     'id' => $id
// // ]);


$statement3 = $conn->prepare("DELETE FROM orders WHERE id = :id");
$statement3->execute([
    'id' => $id
]);

if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

$uri = "LOCATION: {$previous}";
header($uri);