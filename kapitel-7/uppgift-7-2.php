<?php
/* Gör ett webbapp som i en textruta frågar efter ett filnamn på servern. Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. Om kontrollen ger OK, så öppna filen och skriv ut filinnehållet på skärmen. */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 7-2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Läsa textfil</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Filnamn</label>
            <input type="text" name="filnamn" required></label>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. */
       $filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
       if ($filnamn) {
       
       if (preg_match("/[a-zåäö0-9.]+/", $filnamn)) {
            echo "<p>Filnamnet är korrekt!</p>";
            /* Läsa filen */
            $texten = file_get_contents($filnamn);
            /* skriv ut på skärmen */
            echo "<p>$texten</p>";
        } else {
            echo "<p>Filnamnet är INTE korrekt!</p>";
        }
    }
        
    
        ?>
    </div>
</body>
</html>