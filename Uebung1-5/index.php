<form method="POST" action="?">
    <input type="text" name="name" placeholder="Benutzername" />
    <input type="submit" value="Absenden" />
    <select name="pizza" id="cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </select>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name'];
        echo "Hallo {$username}!";
    }
?>

