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
        <h1>Passwordmeter</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Lösenord</label>
            <input type="password " name="lösen" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

       /* Ta emot data */
       $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
       $poäng = 0;
       $fel = false;

       if ($losen) {
           /* Skall inehålla minst en stor bokstav */
           $versaler = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'I', 'K', 'L', 'M', 
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Å', 'Ä', 'Ö'];
           foreach ($versaler as $tacken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = true;
                }
            }


           /* Skall inehålla minst en liten bokstav */
           $gemener = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'i', 'k', 'l', 'm', 
           'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'å', 'ä', 'ö'];
              foreach ($gemener as $tacken) {
                   $pos = strpos($losen, $tecken);
                   if ($pos !== false) {
                       $poäng += 1;
                       $fel = true;
                   }
               }

           /* Skall inehålla minst en siffra */
           $siffror = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
           foreach ($siffror as $tacken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = true;
                }
            }

           /* Skall vara minst 8 tecken: strlen */
           if (strlen($losen) >= 8) {
               $poäng += 1;
               $fel = true;
           }

           /* Skall inehålla minst ett specialtecke: ¤#%/&%¤# */
           $special = ['!', '"', '#', '¤', '%', '&', '/', '(', ')', '=', '@', '£', '$', '€', '{', '[', ']', '}', '+', '-'];
           foreach ($special as $tecken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = true;
                }
            }
            if ($fel) {
                echo "<p>Ditt lösenord uppfyller inte alla kriterier</p>";
            } else {
                echo "<p>Ditt lösenord fick $poäng poäng.</p>";
            }
            
       }
      
        
    
        ?>
    </div>
</body>
</html> 