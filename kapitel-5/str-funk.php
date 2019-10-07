<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strängfunktioner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Vanliga strängfunktioner</h1>
    <?php
    /* Dela upp en sträng i dess tecken */
    $land = "Sverige";
    $delar = str_split($land);

    /* Skriver ut ett tecken per rad */
    foreach ($delar as $bokstav) {
        echo "<p>$bokstav</p>";
    }

    /* Dela upp en mening i dess ord */
    $mening = "Sverige är ett land i norden";
    $delar = explode(" ", $mening);

    /* Skriver ut ett ord per rad */
    foreach ($delar as $ord) {
        echo "<p>$ord</p>";
    }

    /* Rensa bort tomrum i text (början och slut) */
    $mening = "  Sverige är ett land i norden  ";
    $trimmadMening = trim($mening);
    echo "<p>_$trimmadMening\_</p>";

    /* Hur lång är en sträng? */
    $mening = "Sverige är ett land i norden";
    $längd = strlen($mening);
    echo "<p>Meningen är $längd tecken lång</p>";


    /* Plocka ut delar ur en sträng */
    $url = "https://www.netflix.com/watch/70275032?trackId=14272744";
    $start = substr($url, 0, 4);
    echo "<p>De 4 första tecken är $start</p>";
    $del =  substr($url, 12, 7);
    echo "<p>Hemsidan är $del</p>";

    /* Hitta en text i en text */
    if (strstr($url, "netflix")) {
        echo "<p>Netflix hittades i texten</p>";
    } else {
        echo "<p>Netflix hittades inte i texten</p>";
    }
    
    /* Var finns ordet i texten? */
    $position = strpos($url, "netflix");
    echo "<p>Ordet netflix finns på position $position</p>";

    ?>
    </div>
</body>
</html>