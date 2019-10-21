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
    <title>Uppgift 5.5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Kontrolera inmatning</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Epost</label>
            <input type="email " name="epost" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

       /* Ta emot data */
       $epost = filter_input(INPUT_POST, 'epost', FILTER_SANITIZE_STRING);
       if ($epost) {
           /* Ur epostadressen plocka ut domänen och namnet, enligt formen "namn@domän". */
        $delar = explode('@', $epost);
        echo "<p>Namnet är $delar[0]</p>";
        echo "<p>Domänen är $delar[1]</p>";
       }
    
        
    
        ?>
    </div>
</body>
</html> 