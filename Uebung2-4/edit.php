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
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Preset Daten laden


$preset = null;
if (isset($_GET['id'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
    }
}

$sql = "SELECT * FROM customers WHERE id = :id";
$statement = $conn->prepare($sql);

$statement->execute([
    'id' => $id
]);

$preset = $statement->fetch();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($preset) {
        $sql = "UPDATE customers SET company = :company,
                        last_name = :last_name,
                        first_name = :first_name,
                        company = :company,
                        email_address = :email_address,
                        id = :id";                      

    }
} 

else {
    header('Location: index.php');
    die();
}

?>
<form method="post" action='edit.php?id=<?= $preset ? $preset['id'] : '' ?>'>
    <input type="text" id="company" name="company" value="<?= $preset ? $preset['company'] : '' ?>">
    <input type="text" id="first_name" name="first_name" value="<?= $preset ? $preset['first_name'] : '' ?>">
    <input type="text" id="last_name" name="last_name" value="<?= $preset ? $preset['last_name'] : '' ?>">
    <input type="email" id="email_address" name="email_address" value="<?= $preset ? $preset['email_address'] : '' ?>">

    <button type="submit">Save</button>
<form>