<?php
/* Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror. */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 5.1</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Omvandla tal till bokstäver</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Namn</label>
            <input type="text" name="namn" required>
            <label>Adress</label>
            <input type="text" name="adress" required>
            <label>Postnr</label>
            <input type="text" name="postnr" required>
            <label>postort</label>
            <input type="text" name="postort" required>
            <label>epost</label>
            <input type="email " name="epost" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

            /* Ta emot data som skickas */
            $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
            $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
            $postnr = filter_input(INPUT_POST, 'postnr', FILTER_SANITIZE_STRING);
            $postort = filter_input(INPUT_POST, 'postort', FILTER_SANITIZE_STRING);
            if ($namn && $adress && $postnr && $postort) {          
           
        /* Kontrollera att alla fälten innehåller minst 3 tecken. */

              if (strlen($namn) < 3) {
                  echo "<p>Namnet är for kort, vg försök igen!</p>";
              }
              if (strlen($adress) < 3) {
                  echo "<p>Namnet är for kort, vg försök igen!</p>";
              }
              if (strlen($postnr) < 3) {
                  echo "<p>Namnet är for kort, vg försök igen!</p>";
              }
              if (strlen($postort) < 3) {
                  echo "<p>Namnet är for kort, vg försök igen!</p>";
              }

        /* Kontrollera att postnummret inehåller 5 tecken */
        if (strlen($postnr)!= 5) {
            echo "<p>Postnr är fel längd. Postnr skall vara 5 tecken långt, vg försök igen</p>";
        }

        /* Kontrollera att postnummert inehåller endast siffror */
        if (!is_numeric($postnr)) {
            echo "<p>Postnr skall endast inehålla siffror, vg försök igen</p>";
        }

        /* Kontrolera att epostadressen är minst 6 tecken lång */
        if (strlen($epost) < 6) {
            echo "<p>Epost skall vara minst 6 tecken lång, vg försök igen</p>";
        }
        /* Kontrolera att epostadressen inehåller ett @, och minst en punkt */
        if (!strstr($epost, '@')) {
            echo "<p>Epost skall inehålla ett @-tecken, vg försök igen</p>";
        }
        if (!strstr($epost, '.')) {
            echo "<p>Epost skall inehålla minst en punkt, vg försök igen</p>";
        }
        
        
    }
        ?>
    </div>
</body>
</html> 