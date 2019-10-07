<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4.4</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Omvandla tal till bokstäver</h1>
        <form action="./uppgift-4-4.php" method="POST">
            <label>Tal</label>
            <input type="number" name="tal" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

            /* Ta emot data som skickas */
            $tal = filter_input(INPUT_POST, 'tal', FILTER_SANITIZE_NUMBER_INT);
           
            /* Skriv ut talet som bokstäverna om mindre än 10 */
            if ($tal) {
                $tallista = ['Noll', 'Ett', 'Två', 'Tre', 'Fyra', 'Fem', 'Sex', 'Sju', 'Åtta', 'Nio'];

                /* Dela upp talet i dessa siffror */
                $delar = str_split($tal);
                

                /* Talet */
                echo "<p>Talet $tal skrivs \"";
                /* Skriv ut talets siffror i bokstavsform */
                foreach ($delar as $siffra) {
                    
                    echo "$tallista[$siffra]";

                }
                echo "\".</p>";
            }
         
        ?>
    </div>
</body>
</html> 