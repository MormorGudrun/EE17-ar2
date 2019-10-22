<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Läsa in csv-fil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="kontainer">
        <h1>Läsa CSV-Fil</h1>
        <?php

        /* Är filen läsbar? */
        $filnamn = 'restauranger.csv';

        if (is_readable($filnamn)) {
            //echo 'The file is readable';

            /* Läs in filen */
            $rader = file($filnamn);

            echo "<table>";
            echo "<tr><th>Namn</th><th>Gata</th><th>Postnr</th><th>Postort</th></tr>";

            foreach ($rader as $rad) {

                    /* Dela upp raden */
                    $delar = explode(', ', $rad);
                    echo "<tr><td>$delar[0]</td><td>$delar[1]</td><td>$delar[2]</td><td>$delar[3]</td></tr>";
            }
            echo "</table>";
        } else {
            echo 'The file is not readable';
        }

        
?>

        </div>

</body>
</html>