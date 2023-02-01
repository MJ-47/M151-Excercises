<?php
    //Session starten
    session_start();

    $anzahl_aufrufe = 1;

    //Daten verarbeiten
    if (isset($_SESSION['anzahl_aufrufe'])) {
        $anzahl_aufrufe = $_SESSION['anzahl_aufrufe'];
    }
    echo "Die Seite wurde {$anzahl_aufrufe}x aufgerufen.";

    $anzahl_aufrufe++;

    //Daten speichern
    $_SESSION['anzahl_aufrufe'] = $anzahl_aufrufe;
?>