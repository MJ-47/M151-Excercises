<h1>Pizza Konfigurator</h1>
<p>Deine Pizza besteht aus folgenden Toppings:</p>
<ul>
    <?php  
    
    //Session starten
    session_start();

    $toppings = array();

    //Daten verarbeiten
    if (isset($_SESSION['toppings'])) {
        $toppings[] = $_SESSION['toppings'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Daten speichern
        if ($toppings) {
            $_SESSION['toppings'] = $toppings;   
        }
        
        $toppings[] = $_POST['topping'];
    }
    var_dump($_SESSION['toppings']);

    foreach ($toppings as $topping): ?>
        <li><? echo $topping?></li>
    <?php endforeach;?>
</ul>

<div>Füge weitere Zutaten hinzu: </div>
<form method="POST" action="">
    <input type="text" name="topping" placeholder="Zutat" />
    <input type="submit" value="Hinzufügen" />
</form>
