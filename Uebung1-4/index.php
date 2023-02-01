<?php
    $username = $_GET['username'];
    if (strlen($username) == 0) {
        $username = 'user1';
    }

    echo "Hallo {$username}!<br />";

    if ($_GET['age']) {
        $age = $_GET['age'];
        echo "Du bist {$age} Jahre alt.";
    }

    //-Aufruf mit http://m151.test/Uebung1-4/index.php?username=Mensch&age=222
    //-If Klausel
?>