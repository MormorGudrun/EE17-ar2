<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 3.5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lånekalkylator</h1>
        <?php
        /* Ta emot data som skickas */
        $belopp = $_REQUEST["belopp"];
        $ranta = $_REQUEST["ranta"];
        $tid = $_REQUEST["tid"];
        /* Programmet ska sedan räkna ut den totala lånekostnaden. 
        (Räknas ut genom ränta på ränta-principen, årsvis). 
        Så för ett tvåårigt lån på 5000 med räntan 4% skulle alltså lånekostnaden bli 5000*1,04*1,04 - 5000 */
        $kostnad = $belopp;
        for ($i = 0; $i < $tid; $i++) { 
            $kostnad = $kostnad * (1 + $ranta / 100);
        }
        $kostnad = $kostnad - $belopp;
        echo "<p>Totala lånekostnaden är $kostnad.</p>";
        ?>
    </div>
</body>
</html>
