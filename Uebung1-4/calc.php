<?php
    $x = intval($_GET['x']);
    $y = intval($_GET['y']);
    $mode = $_GET['mode'];
    $res = 0;

    switch ($mode) {
        case "plus":
            $res = $x + $y;
            break;

        case "minus":
            $res = $x - $y;
            break;

        case "mal":
            $res = $x * $y;
            break;

        case "div":
            $res = $x / $y;
            break;

        default:
            $res = "Did not work.";
            break;
    }

    echo "Result: {$res}<br />"; 

    //-Aufruf mit http://m151.test/Uebung1-4/calc.php?x=3&y=2&mode=mal

?>