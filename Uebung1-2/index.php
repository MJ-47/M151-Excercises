<?php
    $anzahl_aufrufe = 1;
    echo "Die Seite wurde {$anzahl_aufrufe}x aufgerufen.";
    
    $anzahl_aufrufe++;
    
    //Nein die Variable ist nicht definiert. Es wird eine Warnung geworfen.
    //Er ändert sich, wird aber mit dem Neuladen immer wieder neu definiert.
?>


