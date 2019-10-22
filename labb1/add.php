<?php
/*
* Gör ett webbapp som i en textruta frågar efter ett filnamn på servern. Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. Om kontrollen ger OK, så öppna filen och skriv ut filinnehållet på skärmen.
*
* PHP version 7
* @category   Kontrollera inmatning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lagg till restaurang</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lägg till restaurang</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Restaurang</label>
            <input type="text" name="restaurang" required>
            <label>Gata</label>
            <input type="text" name="gata" required>
            <label>Postnr</label>
            <input type="text" name="postnr" required>
            <label>Postort</label>
            <input type="text" name="postort" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

        $filnamn = 'restauranger.csv';

        /* Ta emot data som skickas */
        $restaurang = filter_input(INPUT_POST, 'restaurang', FILTER_SANITIZE_STRING);
        $gata = filter_input(INPUT_POST, 'gata', FILTER_SANITIZE_STRING);
        $postnr = filter_input(INPUT_POST, 'postnr', FILTER_SANITIZE_STRING);
        $postort = filter_input(INPUT_POST, 'postort', FILTER_SANITIZE_STRING);
        if ($restaurang && $gata && $postnr && $postort) {
            /* Kontrollera filnamnet så att det endast innehåller bokstäver, siffror och punkt. */
            $handtag = fopen($filnamn, 'a');

            fwrite($handtag, "\n$restaurang, $gata, $postnr, $postort");

            fclose($handtag);
        }
        
        ?>
    </div>
</body>
</html>