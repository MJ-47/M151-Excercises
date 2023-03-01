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
} 
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$sql = "SELECT * FROM customers";
$statement = $conn->prepare($sql);

$statement->execute();


?>

<style type=”text/css”>
    td tr {
        border: solid black;
        border-width: thick;
    }

    a {
        font-size: 20pt;
    }
</style>
<h1>Northwind Table</h1>
<table>

    <tr>
        <th>Id</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Job</th>
    </tr>

    <?php while ($row = $statement->fetch()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?> </td>
            <td><?= htmlspecialchars($row['last_name']) ?> </td>
            <td><?= htmlspecialchars($row['first_name']) ?></td>
            <td><?= htmlspecialchars($row['job_title']) ?></td>
            <td><a href='./edit.php?id=<?= $row['id'] ?>'>Edit</a>
        </tr>
    <?php } ?>

</table>