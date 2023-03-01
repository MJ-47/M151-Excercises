<?php

//Dump function
function d($args) {
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
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/*$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();   

*/
if($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
}

$sql = "SELECT * FROM orders WHERE customer_id = :id";
$statement = $conn->prepare($sql);

$statement->execute([
  'id' => $id
]);


?>

<h1>Northwind Table</h1>
<table>

  <tr>
    <th>Order Id</th>
    <th>Order Date</th>
  </tr>

  <?php while ($row = $statement->fetch()) { ?>
    <tr>
      <td><?=  htmlspecialchars($row['id']) ?> </td>
      <td><?=  htmlspecialchars($row['order_date']) ?></td>
      <td><a href='./delete.php?id=<?= $row['id'] ?>'>Delete</a>
    </tr>
  <?php } ?>

</table>