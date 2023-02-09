<?php

//Session starten
session_start();

$toppings = [];

//Daten lesen
if (isset($_SESSION['toppings'])) {
    $toppings = $_SESSION['toppings'];
}

//Daten verarbeiten

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newTopping = array_key_exists('topping', $_POST) ? $_POST['topping'] : '';

    if ($newTopping !== '') {
        array_push($toppings, $newTopping);
    }
}

//Daten speichern
$_SESSION['toppings'] = $toppings;

var_dump($toppings);

?>

    <h1>Pizza Konfigurator</h1>
    <p>Deine Pizza besteht aus folgenden Toppings:</p>
    <ul>
        <?php foreach ($toppings as $value) :?>

        <li><?= $value ?></li>
    <?php endforeach; ?>
    </ul>

    <div>Füge weitere Zutaten hinzu: </div>
    <form method="POST" action="?">
        <input type="text" name="topping" placeholder="Zutat" />
        <input type="submit" value="Hinzufügen" />
    </form>